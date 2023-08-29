@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="row my-5">
        <div class="col-lg-8 ">
            <h1 classs="mb-3 text-center">{{ $post->title }}</h1>
            <a href="" class="btn btn-success"> <span data-feather="arrow-left"> Back to my posts</span></a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"> <span data-feather="edit">Edit</span></a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                  @csrf
                  <button class="btn btn-danger " onclick="return confirm('Are you sure?')">
                   Delete
                  </button>
            </form> 
            </div>
     
        <div class="col-lg-8 ">

            @if($post->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img class="img-fluid  mt-3 " src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" >
            </div>
            @else
            <img class="img-fluid mt-3 " src="https://source.unsplash.com/666x250/?{{ $post->category->name }}" alt="{{ $post->category->name }}" >
            @endif
            
        </div>
            <article class="col-lg-8 my-2">
                {!! $post->content !!} 
            </article>
        
        </div>
    </div>
</div>
@endsection