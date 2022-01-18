@extends('layouts.auth-layout')
@section('admin-layout')


        <div class="d-flex align-items-center justify-content-center bg-br-primary">
            <div class="login-wrapper mg-y-40 wd-300 wd-xs-400 pd-xs-40 bg-white rounded shadow-base">
              <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Admin <span class="tx-info">Registration</span> <span class="tx-normal">]</span></div>
              <div class="tx-center mg-b-30">The Admin Template For Perfectionist</div>

              
              <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('register') }}" method="POST">
                @csrf
      
              <div class="form-group">
                  <label for="name">Full Name</label>
                <input id="name" name="name" value="{{ old('name') }}"  type="text" class="form-control" placeholder="Enter your full name" required autocomplete>
              </div><!-- form-group -->

              
              <div class="form-group">
                <label for="email">Email</label>
              <input id="email" name="email" value="{{ old('email') }}"  type="email" class="form-control" placeholder="Enter your email" required autocomplete>
            </div><!-- form-group -->

              <div class="form-group">
                  <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password" required autocomplete="new-password">
              </div><!-- form-group -->

       
              <div class="form-group">
                <label for="password_confirmation">Re-type Password</label>
              <input  id="password_confirmation"  name="password_confirmation" type="password" class="form-control" placeholder="Re-enter your password" required>
            </div><!-- form-group -->
      
              <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
              <button type="submit" name="submit" class="btn btn-info btn-block">Sign Up</button>

            </form>
      
              <div class="mg-t-40 tx-center">Already a member? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>
            </div><!-- login-wrapper -->
          </div><!-- d-flex -->

        @endsection