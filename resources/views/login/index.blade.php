<style>
  .login {
    margin-left: -250px;
  }
</style>

@extends('layouts.main4')
  <!-- <body class="d-flex align-items-center py-4 bg-body-tertiary"> -->

  @section('container')
  <div class="login">
  <div class="row justify-content-center">
    <div class="col-md-4">

      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <main class="form-signin w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        <form action="/login" method="post">
          @csrf
          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
          </div>
          <div class="form-floating">
            <select name="user_level" class="form-control">
              <option value="" disabled selected>Choose user level</option>
              <option value="admin">Admin</option>
              <option value="owner">Owner</option>
              <option value="dapur">Dapur</option>
            </select>
            <label for="user_level">User Level</label>
          </div>      
          <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Remember me
            </label>
          </div>
          <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>
        <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
      </main>
    </div>
  </div>
  </div>

@endsection
