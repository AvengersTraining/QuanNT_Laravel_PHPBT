@extends('admin.pages.dashboard.index')
@section('title_content', 'Create Post')
@section('link_active_content', ' / Posts/ Edit Post')

@section('show_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
                            @method('PUT')
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="custom-select" id="category" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id === $post->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control"
                                           name="title" id="title" value="{{ $post->title }}">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback display-block" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Tag</label>
                                    <select class="custom-select" id="tag" name="tag_id">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ $tag->id === $post->tags[0]->id ? 'selected' : '' }}>
                                                {{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Content</label>
                                    <input type="text" class="form-control"
                                           name="content" id="content" value="{{ $post->content }}">
                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback display-block" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ url()->previous() }}" class="btn btn-default mr-1">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
@endsection
