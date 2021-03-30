@extends('layouts.template')

@section('title')
    Login
@endsection

@section('description')
    Login in Sona hotel in order to make reservation for your favourite room
@endsection

@section('keywords')
    sona, login, hotel, services, room
@endsection



@section('content')

    <!-- Login Section Begin -->
    <section class="contact-section spad odvoji_login">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-content-between col-lg-12">
                <div class="col-lg-7 offset-lg-1">

                    <form action="{{route('login.store')}}" method="POST" class="contact-form">
                        @csrf
                        <div class="row d-flex justify-content-center align-content-between">
                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                <h2>Login</h2>
                            </div>
                            <div class=" col-sm-10 mt-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                            </div>
                            <div class="col-sm-10 ">
                                <input type="password" class="form-control" name="password"  id="password" placeholder="Your Password">
                            </div>
                            <div class="col-sm-10 mb-2 d-flex justify-content-center">
                                <button type="submit" name="btnLogin" id="btnLogin">Login</button>
                            </div>
                            <p class="mt-3"> If you don't have account please <a href="{{ route("register.store") }}">Register</a> first </p>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('warning'))
                        <div class="alert alert-warning">
                            <h3>{{ session('warning') }}</h3>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <h3>{{ session('success') }}</h3>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-success">
                            <h3>{{ session('error') }}</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
@endsection
