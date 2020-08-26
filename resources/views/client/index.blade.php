@extends('client.master')

@section('content')
    @foreach( $posts as $post)
        <div class="row">
            <div class="col-md-12">
                <div class="post-card">
                    <a href="{{ route('client.show', ['slug' => $post->slug]) }}">
                        <h3>{{ $post->title }}</h3>
                        <div>
                            @if (!$post->tags->isEmpty())
                                <span class="label label-default">{{ Str::upper($post->tags[0]->name) }}</span>
                            @endif
                        </div><br>
                        <div class="summary">
                            {{ $post->content }}
                        </div><br>
                        <div class="row small text-grey">
                            <div class="col-md-7 col-xs-7 flex">
                                <div class="author-image">
                                    <img class="author-image-sm" src="{{ asset('images/admin/avatar.jpg') }}" alt="Author Image">
                                </div>
                                <div class="author-details">
                                    {{ $post->postable->name }}
                                </div>
                            </div>
                            <div class="col-md-5 col-xs-5">
                                <div class="published-date text-right">
                                    {{ $post->created_at }}
                                </div>
                            </div>
                        </div> <br>
                    </a>
                </div>
            </div>
        </div>
    @endforeach

    {!! $posts->links('client.paginate') !!}
@endsection
