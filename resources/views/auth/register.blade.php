@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg" style="width: 500px; border-radius: 20px; overflow: hidden; border: 1px solid #C69C6D;">
        
        <div class="card-header text-center py-4" style="background-color: #143628; color: white;">
            <h3 style="font-family: 'Playfair Display', serif; margin: 0;">Join the Peak</h3>
            <small style="color: #C69C6D; text-transform: uppercase; letter-spacing: 2px;">Create Account</small>
        </div>

        <div class="card-body p-5" style="background-color: #F9F7F2;">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-muted">Full Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="padding: 12px; border-radius: 10px;">
                    @error('name') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="padding: 12px; border-radius: 10px;">
                    @error('email') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-muted">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="padding: 12px; border-radius: 10px;">
                        @error('password') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-muted">Confirm</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="padding: 12px; border-radius: 10px;">
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg" style="background-color: #143628; border: none; border-radius: 50px;">
                        Register Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection