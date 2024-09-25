@extends('layouts.font')
@section('title')
    Register
@endsection
@push('styles')
    <style>
        .required::after{
            content: '*';
            color: red;
        }
    </style>
@endpush
@section('content')

<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <div class="register-form">
                    <div class="title">
                        <h3>No Account? Register</h3>
                        <p>Registration takes less than a minute but gives you full control over your orders.</p>
                    </div>
                    <form class="row" method="post" action="{{ route('signUp.sotre') }}">
                        @csrf
                        <div class="col-sm-6">
                            <x-front.input lableName="First Name" required="required" name="first_name" error="first_name"/>
                        </div>
                        <div class="col-sm-6">
                            <x-front.input lableName="Last Name"  required="required" name="last_name" error="last_name"/>
                        </div>
                        <div class="col-sm-6">
                            <x-front.input lableName="Email" type="email" required="required"  name="email" error="email"/>
                        </div>
                        <div class="col-sm-6">
                            <x-front.input lableName="Phone" type="tel" name="phone" optional="(optional)" error="phone"/>
                        </div>
                        <div class="col-sm-6">
                            <x-front.input lableName="Password" type="password" required="required"  name="password"  error="password"/>

                        </div>
                        <div class="col-sm-6">
                            <x-front.input lableName="Confirm Password" type="password" required="required"  name="password_confirmation"/>
                        </div>
                        <div class="button">
                            <button class="btn" type="submit">Register</button>
                        </div>
                        <p class="outer-link">Already have an account? <a href="{{ url('login') }}">Login Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
