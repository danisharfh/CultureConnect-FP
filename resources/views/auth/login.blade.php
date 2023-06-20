@extends('layouts.back')

@section('content')

<main class="login-body" data-vide-bg="{{ asset('image/vid2.mp4') }}">

    <div class="login-form">
        <!-- logo-login -->
        <div class="logo-login">
            <a href="index.html"><img src="{{ asset('image/logo/gogo.png') }}" alt=""></a>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h2>Login Here</h2>
            <div class="form-input">
                <label for="name">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-input">
                <label for="name">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-input pt-30">
                <input type="submit" name="submit" value="login">
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <!-- Forget Password -->
            <a href="{{ route('register') }}" class="registration">Registration</a>
        </form>
    </div>