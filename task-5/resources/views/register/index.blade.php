@extends('layouts.main')

@section ('container')
<div class="row justify-content-center  m-auto">
    <div class="col-lg-5">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
            <form action="/register" method="post">
              @csrf
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error ('name')
                      <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                <div class="form-floating">
                <input type="email" class="form-control  @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error ('email')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-floating rounded-bottom @error('password')is-invalid @enderror">
                <input type="password" class="form-control" id="password" placeholder="Password" required>
                <label for="Password">Password</label>
                @error ('password')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3 ">
                I already have an account.<a href="/login">Login!</a>
            </small>
        </main>
    </div>
  </div>
@endsection