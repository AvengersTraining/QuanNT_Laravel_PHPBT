@extends('admin.pages.dashboard.index')
@section('title_content', 'Create Post')
@section('link_active_content', ' / Posts/ Create Post')

@section('show_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.posts.store') }}">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="custom-select" id="category" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control"
                                           name="title" id="title" placeholder="Title post">
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
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Content</label>
                                    <textarea type="text" class="form-control" name="content" id="content">
                                    </textarea>

                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback display-block" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <input type="hidden" name="postable_type" value="App\Models\Admin"/>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ url()->previous() }}" class="btn btn-default mr-1">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
@endsection
