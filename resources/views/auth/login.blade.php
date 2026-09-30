@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-center text-redmate mb-1">Sign In</h3>
                    <p class="text-center text-muted small mb-4">Access your RedMate account</p>

                    <!-- Alert Notifikasi Berhasil (Setujui Register) -->
                    @if(session('success'))
                        <div class="alert alert-success py-2 small mb-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Enter username" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-yellow w-100 py-2 mt-2">SIGN IN</button>
                    </form>

                    <div class="text-center mt-3">
                        <small class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-redmate fw-bold">Sign Up</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection