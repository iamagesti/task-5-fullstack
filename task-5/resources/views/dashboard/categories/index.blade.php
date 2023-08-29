@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Post Categories</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new category</a>
    <table class="table table-striped table-sm col-lg-8">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <a href="/dashboard/categories/{{ $category->slug }}"  class="btn shadow-none " ><i class="bi bi-eye text-info"></i></a>
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn shadow-none "><i class="bi bi-pencil text-warning"></i></a>
            <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
            @method('delete')
              @csrf
              <button class="btn shadow-none " onclick="return confirm('Are you sure?')">
                <i class="bi bi-x-circle text-danger"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection


