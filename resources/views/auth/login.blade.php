@extends('layouts.auth-layout')
@section('admin-layout')



    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Admin<span
                    class="tx-info"> Login</span> <span class="tx-normal">]</span></div>
            <div class="tx-center mg-b-20">The Admin Template For Perfectionist</div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"  class="form-control" placeholder="Enter your email" required
                    autofocus>
                </div>

            
 
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Enter your password" required
                    autocomplete="current-password">

                    <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div>


    

                <button type="submit" class="btn btn-info btn-block">Sign In</button>

                <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
            </form>


        </div><!-- login-wrapper -->
    </div><!-- d-flex -->


@endsection
