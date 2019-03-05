@extends('layout')

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
        @if(count($post->tags))
            <ul>
                @foreach($post->tags as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach
            </ul>
        @endif
        <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}</p>

        {{$post->body}}
    </div>
    <hr/>
    <ul class="comments">
        @foreach($post->comments as $comment)
            <li>{{$comment->body}}</li>
        @endforeach
    </ul>
    <hr/>
    <div class="card">
        <div class="card-body">
            <form method="post" action="/posts/{{$post->id}}/comments">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Body</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @include('layouts.alert')
        </div>
    </div>
@endsection