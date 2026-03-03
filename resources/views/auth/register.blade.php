@extends('layout.app')

@section('main')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 85vh;">
    <div class="card shadow-lg p-4" style="width: 450px; border-radius: 15px;">

        <h3 class="text-center mb-4 fw-bold">Create Account</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" 
                       name="name" 
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       required autofocus>

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" 
                       name="email" 
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       required>

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" 
                       name="password" 
                       class="form-control @error('password') is-invalid @enderror"
                       required>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" 
                       name="password_confirmation" 
                       class="form-control"
                       required>
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                Register
            </button>

            <!-- Login Link -->
            <div class="text-center mt-3">
                <small>
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                        Login here
                    </a>
                </small>
            </div>

        </form>

    </div>
</div>

@endsection