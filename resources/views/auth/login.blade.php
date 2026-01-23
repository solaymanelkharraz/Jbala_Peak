@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 450px; border-radius: 20px; overflow: hidden; border: 1px solid #C69C6D;">

            <div class="card-header text-center py-4" style="background-color: #143628; color: white;">
                <h3 style="font-family: 'Playfair Display', serif; margin: 0;">Jbala Peak</h3>
                <small style="color: #C69C6D; text-transform: uppercase; letter-spacing: 2px;">Member Login</small>
            </div>

            <div class="card-body p-5" style="background-color: #F9F7F2;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label text-muted">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            style="padding: 12px; border-radius: 10px;">
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label text-muted">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password"
                            style="padding: 12px; border-radius: 10px;">
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-4 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-muted" for="remember">Remember Me</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="background-color: #143628; border: none; border-radius: 50px;">
                            Login to Account
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-center mt-3">
                            <a class="btn btn-link text-muted" href="{{ route('password.request') }}"
                                style="text-decoration: none;">
                                Forgot Your Password?
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection