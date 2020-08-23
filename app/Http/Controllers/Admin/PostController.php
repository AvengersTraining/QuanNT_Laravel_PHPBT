<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.posts.index');
    }

    public function getDatatableIndex()
    {
        $posts = Post::query()->with([
            'category',
            'postable',
        ])->whereHasMorph('postable', [User::class, Admin::class], function ($query) {
            $query->whereNull('deleted_at');
        });

        $dataTables = new DataTables();

        return $dataTables->eloquent($posts)
            ->setRowId('post_{{ $id }}')
            ->setRowAttr([
                'data-id' => '{{ $id }}',
                'data-title' => '{{ $title }}',
            ])
            ->editColumn('category', function (Post $post) {
                return $post->category->name;
            })
            ->editColumn('article_author', function (Post $post) {
                 return $post->postable->name;
            })
            ->editColumn('action', 'admin.pages.posts.datatables.action')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.pages.posts.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
         $adminId = Auth::guard('admin')->id();
         $titlePost = $request->title;

         $post = new Post([
             'category_id' => $request->category_id,
             'postable_id' => $adminId,
             'postable_type' => $request->postable_type,
             'title' => $titlePost,
             'content' => $request->content,
             'slug' => $this->createSlug($titlePost),
             'status' => Post::PULIC_POST,
         ]);

         $post->save();
         $post->tags()->sync($request->tag_id);

        return redirect()->route('admin.posts.index')->with('message', 'Create post successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return void
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('admin.pages.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $slug
     * @return void
     */
    public function edit($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.pages.posts.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $slug
     * @return void
     */
    public function update(PostRequest $request, $slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $adminId = Auth::guard('admin')->id();

        $post->category_id = $request->category_id;
        $post->postable_id = $adminId;
        $post->postable_type = $request->postable_type;
        $post->content = $request->content;

        if ($post->title !== $request->title) {
            $titlePost = $request->title;

            $post->title = $titlePost;
            $post->slug = $this->createSlug($titlePost);
        }

        $post->save();
        $post->tags()->sync($request->tag_id);

        return redirect()->route('admin.users.index')->with('message', 'Update user successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', 'Delete post successfully');
    }

    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    public function getRelatedSlugs($slug, $id = 0)
    {
        return Post::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}
