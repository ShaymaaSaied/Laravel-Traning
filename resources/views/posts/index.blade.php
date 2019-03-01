@extends('layout')

@section('content')
    <h3 class="pb-4 mb-4 font-italic border-bottom">
        Posts
    </h3>
    @foreach($posts as $post)
        @include('posts.post')
    @endforeach
    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
    </nav>

@endsection