@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10 ">
            <h1 classs="mb-3 text-center">{{ $post->title }}</h1>
            <p>Author: <a href="/posts?author={{ $post->author->id }}" class="text-decoration-none">{{ $post->author->name }}</a> Category : <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            <div class="text-center">
                @if($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img class="img-fluid  " src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" >
                </div>
                @else
                <img class="img-fluid  " src="https://source.unsplash.com/666x250/?{{ $post->category->name }}" alt="{{ $post->category->name }}" >
                @endif
            </div>
           
            <article class="my-2">
                {!! $post->content !!} 
            </article>
        <a href="/posts" class="d-block mt-3">Back to posts</a>
        </div>
    </div>
</div>

    
@endsection
