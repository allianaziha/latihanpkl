@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-body">
  <div class="col-12 col-sm-8 col-md-6 col-lg-4 px-4">
    <div class="text-center mb-4">
      <h2 class="mt-3 mb-1 fs-5 fw-bold">Welcome Back</h2>
      <p class="mb-4">Please sign in to your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input id="email" type="email"
               class="form-control @error('email') is-invalid @enderror"
               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password"
               class="form-control @error('password') is-invalid @enderror"
               name="password" required autocomplete="current-password">
        @error('password')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>

      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember"
                 {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">
            Remember me
          </label>
        </div>
        @if (Route::has('password.request'))
          <a class="text-primary small" href="{{ route('password.request') }}">
            Forgot Password?
          </a>
        @endif
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2 mb-3">Sign In</button>

      <div class="text-center">
        <p class="mb-0">New here?
          <a class="text-primary fw-medium" href="{{ route('register') }}">Create an account</a>
        </p>
      </div>
    </form>
  </div>
</div>
@endsection
