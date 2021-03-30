@extends('layouts.admin')

@section('title')
    Sona | Editing user
@endsection

@section('description')
    Website for reservation hotel rooms - Information about registered users and managing users
@endsection

@section('keywords')
    admin panel, users, user editing
@endsection

{{--@dd($type)--}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <div class="container mt-3 col-lg-6">
                            <div class="row d-flex justify-content-center align-content-between">
                                <div >
                                    <form action="{{ route('users.update',  $user->id) }}"  method="POST" class="contact-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="row d-flex justify-content-center align-content-between">
                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                                <h2 class="mb-0">Update user</h2>
                                            </div>
                                            <div class="col-sm-12 d-flex">
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">Firstname</p>
                                                    <input type="text" class="form-control adminForm" name="firstname" id="tbFirstNameUpdate" value="{{ $user->firstname }}">
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">Lastname</p>
                                                    <input type="text" class="form-control adminForm" name="lastname" id="tbLastNameUpdate" value="{{ $user->lastname }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 d-flex">
                                                <div class="col-sm-12 mt-3">
                                                    <p class="text-black font-weight-bold">Email</p>
                                                    <input type="email" class="form-control adminForm" name="email" id="tbEmailUpdate" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 d-flex">
                                                <div class="form-group col-sm-6 mb-2 mt-2">
                                                    <p class="text-black font-weight-bold">USER ROLE</p>
                                                    <select class="form-control adminFormWhite" id="ddlRolesUserUpdate" name="userRole">
                                                        @foreach($roles as $r)
                                                            <option value="{{ $r->id }}"  {{ $r->id == $user->role_id ? "selected" : "" }}>{{$r->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-9 mb-2 mt-4 d-flex justify-content-center">
                                                    <input type="submit" class="btn btn-warning btnSubmitA" name="btnUpdateUser" id="btnUpdateUser" value="Update" />
                                                    <a href="{{ route('users.index') }}" class="btn btn-dark ml-2"><i class="fa fa-arrow-left"></i>  Back to list of users</a>
                                                </div>
                                            </div>
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
{{--                                    @if (session()->has('errorUpdateUser'))--}}
{{--                                        <div class="alert alert-warning">--}}
{{--                                            <h3>{{ session('errorUpdateUser') }}</h3>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                    @if (session()->has('warningUpdateUser'))
                                        <div class="alert alert-warning">
                                            <h3>{{ session('warningUpdateUser') }}</h3>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
