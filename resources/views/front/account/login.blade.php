@extends('front.layouts.app')
@section('customCss')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
@section('main')
<section class="section-5">
    <div class="container my-3">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center align-items-center">
            <!-- Left Image Column -->
            <div class="col-md-6 mb-4 mb-md-0 mx-2">
                <img src="{{ asset('assets/images/login.jpg')}}" alt="Login Image" class="img-fluid rounded" style=" height: 400px;">
            </div>

            <!-- Right Login Form Column -->
            <div class="col-md-4">
                @include('front.layouts.message')

                <div class="card border-0 p-4" style="box-shadow: 0 0 20px rgba(0, 128, 0, 0.3);">

                    <h1 class="h3">Login</h1>
                    <form action="{{ route('account.authenticate') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="example@example.com">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="password" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary mt-2">Login</button>
                            <a href="{{ route('account.forgotPassword') }}" class="mt-3">Forgot Password?</a>
                        </div>

                        <a href="{{ route('redirect.google') }}" class="btn btn-danger mt-3 w-100">
                            <i class="bi bi-google me-2"></i> Login with Google
                        </a>
                        
                        <a href="{{ route('redirect.facebook') }}" class="btn btn-primary mt-2 w-100" style="background-color: #3b5998; border-color: #3b5998;">
                            <i class="bi bi-facebook me-2"></i> Login with Facebook
                        </a>
                    </form>                    
                </div>

                <div class="mt-1 text-center">
                    <p>Do not have an account? <a href="{{ route('account.registration') }}">Register</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>

@endsection