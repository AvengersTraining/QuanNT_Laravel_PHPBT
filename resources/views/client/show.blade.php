@extends('client.master')

@section('content')
    <div class="article-wrapper" style="height: auto !important;">
        <div class="row">
            <div class="col-md-12">
                <img src="https://stackcoder.in/storage/canvas/images/5EbEoLwsiFeuhC8GPCQQIMB3FwGgL0StSwC0ZPE1.jpeg"
                     alt="URL Redirects From Called Functions In Laravel | StackCoder" class="width100">
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $post->title }}</h1> <br>
            </div>
        </div>
        <div class="row text-grey">
            <div class="col-md-9 col-xs-12">
                <div class="tags">
                    @if (!$post->tags->isEmpty())
                        <span class="label label-default">{{ Str::upper($post->tags[0]->name) }}</span>
                    @else
                        <span class="label label-default">NO_TAG</span>
                    @endif
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="published-date text-right">
                    {{ $post->created_at }}
                </div>
            </div>
        </div>
        <br><br>
        <div class="row ql-container">
            <div class="col-md-12">
                {!! $post->content !!}
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-3 author-image-wrapper">
                <picture>
                    <img loading="lazy" class="author-image"
                         src="{{ asset('images/admin/avatar.jpg') }}"
                         alt="Author Image">
                </picture>
            </div>
            <div class="col-md-9 author-details">
                <div class="text-grey">AUTHOR</div>
                <h3 class="text-orange">{{ $post->postable->name }}</h3>
                <div class="text-grey">
                    <div>
                        I am a <code>full-stack</code> developer working at <code>WifiDabba India Pvt Ltd</code>. I
                        started this blog so that I can share my knowledge and enhance my skills with constant learning.
                    </div>
                    <br>
                    <div><small>Never stop learning. If you stop learning, you stop growing</small></div>
                </div>
            </div>
        </div>
    </div>
@endsection
