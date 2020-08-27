@extends('admin.pages.dashboard.index')
@section('title_content', 'Create Post')
@section('link_active_content', ' / Posts/ Create Post')

@section('show_content')
    <div class="btn-generate-group mb-3 ml-2">
        <a class="btn btn-warning" id="open_generate_modal_button" href="{{ route('admin.posts.edit', $post->id) }}">
            <i class="fa fa-edit" aria-hidden="true"></i> Edit
        </a>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="text-md mb-2">Category:
                                <b class="d-block">{{ $post->category->name }}</b>
                            </div>
                            @if (!$post->tags->isEmpty())
                                <div class="text-md mb-2">Tag:
                                    <b class="d-block">{{ $post->tags[0]->name }}</b>
                                </div>
                            @endif
                            <div class="text-md mb-2">Title:
                                <b class="d-block">{{ $post->title }}</b>
                            </div>
                            <div class="text-md">Content:
                                {!! $post->content !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="text-muted">
                                <div class="text-md mb-2">Creator:
                                    <b class="d-block">
                                        {{ $post->postable_type === 'App\Models\Admin' ? 'Admin: ' : '' }} {{ $post->postable->name }}
                                    </b>
                                </div>
                                <div class="text-md mb-2">Created At:
                                    <b class="d-block">{{ $post->created_at }}</b>
                                </div>
                                <div class="text-md mb-2">Updated At:
                                    <b class="d-block">{{ $post->updated_at }}</b>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
