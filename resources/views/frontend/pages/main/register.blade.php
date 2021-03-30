@extends('layouts.template')

@section('title')
    Register
@endsection

@section('description')
    Register in Sona hotel in order to make reservation for your favourite room
@endsection

@section('keywords')
    sona, register, hotel, services, room
@endsection


@section('content')
    <!-- Login Section Begin -->
    <section class="contact-section spad odvoji_login">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-content-between col-lg-12">
                <div class="col-lg-7 offset-lg-1">

                    <form action="{{ route('register.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="row d-flex justify-content-center align-content-between">
                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                <h2>Register</h2>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder=" First Name">
                                <p class="err"></p>
                            </div>
                            <div class=" col-sm-10">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                                <p class="err"></p>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                <p class="err"></p>
                            </div>
                            <div class="col-sm-10 ">
                                <input type="password" class="form-control" name="password"  id="password" placeholder="Password">
                                <p class="err"></p>
                            </div>

                            <div class="col-sm-10 mb-2 d-flex justify-content-center">
                                <button type="submit" name="btnLogin" id="btnLogin">Register</button>
                            </div>
                            <p class="mt-3"> If you already have account please <a href="{{ route("login.create") }}">Login</a>  </p>
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
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <h3>{{session('success') }}</h3>
                        </div>
                    @endif
                    @if (session()->has('warning'))
                        <div class="alert alert-warning">
                            <h3>{{ session('warning') }}</h3>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
@endsection
