
@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts">
          @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if(request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <div class="input-group-append">
                  <button class="btn btn-dark" type="submit">Search</button>
                </div>
              </div>
        </form>
    </div>
</div>

@if($posts->count())
<div class="card mb-3">
  @if($posts[0]->image)
  <div style="max-height: 400px; overflow:hidden;">
      <img class="img-fluid " src="{{ asset('storage/'.$posts[0]->image) }}" alt="{{ $posts[0]->category->name }}">
  </div>
  @else
  <img class="card-img-top" src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}">
  @endif
    
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
      <p>
        <small class="text-muted">
            Author: <a href="/posts?author={{ $posts[0]->author->id }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> Category : <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
            {{ $posts[0]->created_at->diffForHumans() }} 
        </small>
      </p>
      <p class="card-text">{{ $posts[0]->content }}</p>
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
  </div>


<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card" >
                <div class="position-absolute bg-dark px-3 py-2 text-white" style="background-color:rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                @if($post->image)
                    <img class="img-fluid " src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" >
                @else
                <img class="card-img-top" src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                @endif
                
                <div class="card-body">
                  <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                  <p>
                    <small class="text-muted">
                        Author: <a href="/posts?author={{ $post->author->id }}" class="text-decoration-none">{{ $post->author->name }}</a> 
                        {{ $post->created_at->diffForHumans() }} 
                    </small>
                  </p>
                  <p class="card-text">{{ $post->content }}</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@else
    <p class="text-center fs-4">Sorry,no post found.</p>
@endif
<div class="d-flex justify-content-end">
  {{ $posts->links() }}
</div>


@endsection

