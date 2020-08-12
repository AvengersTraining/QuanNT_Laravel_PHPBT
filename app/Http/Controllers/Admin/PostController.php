<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
