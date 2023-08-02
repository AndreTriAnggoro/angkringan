<style>
  .register {
    margin-left: -250px;
  }
</style>

@extends('layouts.main4')
  <!-- <body class="d-flex align-items-center py-4 bg-body-tertiary"> -->

  @section('container')
  <div class="register">
  <div class="row justify-content-center">
    <div class="col-lg-4">
      <main class="form-registration w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">Form Registration</h1>
        <form action="/register" method="post">
            <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            @csrf
          <div class="form-floating">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
            <div class="invalid-feedback">
                The name field is required
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email"class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
            <label for="email">Email Addres</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password"class="form-control @error('password') is-invalid @enderror" id="password" placeholder="name@example.com" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <select name="user_level" class="form-control" required>
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
          <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
        </form>
        <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
      </main>
    </div>
  </div>
  </div>
@endsection
