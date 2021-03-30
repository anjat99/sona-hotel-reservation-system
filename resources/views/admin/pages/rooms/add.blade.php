@extends('layouts.admin')

@section('title')
    Sona | Rooms
@endsection

@section('description')
    Website for reservation hotel rooms - Information about rooms and managing rooms
@endsection

@section('keywords')
    admin panel, rooms
@endsection

{{--@dd($prices)--}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <div class="container mt-3">
                            <div class="row d-flex justify-content-center align-content-between col-lg-12">
                                <div class="col-lg-7 offset-lg-1">
                                    <form action="{{ route('rooms-manage.store') }}" method="POST" class="contact-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row d-flex justify-content-center align-content-between">
                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                                <h2 class="mb-0">INSERT ROOM</h2>
                                            </div>
                                            <div class="col-sm-12 d-flex">
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">ROOM NAME</p>
                                                    <input type="text" class="form-control adminForm" name="name" id="tbFirstNameUpdate">
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">SIZE OF ROOM</p>
                                                    <input type="number" min="10" max="100" class="form-control adminForm" name="size"  id="tbUpdateCapacity">
                                                </div>
                                            </div>
                                            <div class="form-group purple-border col-sm-11 mt-2">
                                                <p class="text-black font-weight-bold">DESCRIPTION</p>
                                                <textarea class="form-control adminForm" name="description"  id="taDescriptionUpdate"></textarea>
                                            </div>
                                            <div class="col-sm-12 d-flex">
                                                <div class="form-group col-sm-6 mb-2 mt-2">
                                                    <p class="text-black font-weight-bold">PRICE</p>
                                                    <select class="form-control adminFormWhite" id="ddlRolesUserUpdate" name="price">
                                                        <option value="0" selected disabled>Choose price:</option>
                                                        @foreach($prices as $p)
                                                            <option value="{{ $p->id }}">{{$p->price}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6 mb-2 mt-2">
                                                    <p class="text-black font-weight-bold">TYPES</p>
                                                    <select class="form-control adminFormWhite" id="ddlRolesUserUpdate" name="type">
                                                        <option value="0" selected disabled>Choose type:</option>
                                                            @foreach($types as $t)
                                                                <option value="{{ $t->id }}">{{$t->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>


                                            </div>

                                            <div class="col-sm-12 d-flex mb-3">
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">QUANTITY ROOMS</p>
                                                    <input type="number" min="0" max="10" class="form-control adminForm" name="quantity"  id="quantity">
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">IMAGE</p>
                                                    <input type="file"  class="form-control adminForm" name="image"  id="image">

                                                </div>

                                            </div>
                                            <div class="col-sm-12 d-flex flex-column jusitfy-content-center align-items-center">
                                                <p class="text-black font-weight-bold">SERVICES</p> <br>
                                                <div class="form-check ml-5">
                                                    @foreach($services as $s)
                                                        <input type="checkbox" class="form-check-input" id="service{{ $s->id }}" name="service[]" value="{{ $s->id }}">
                                                        <label class="form-check-label" for="service{{ $s->id }}">{{ $s->name }}</label> <br>
                                                    @endforeach
                                                </div>

                                            </div>

                                            <div class="col-sm-12 mb-2 mt-4 d-flex justify-content-center">

                                                    <input type="submit" class="btn btn-warning btnSubmitA" name="btnUpdateUser" id="btnUpdateUser" value="INSERT ROOM" />
                                                    <a href="{{ route('rooms-manage.index') }}" class="btn btn-dark ml-2"><i class="fa fa-arrow-left"></i>  Back to list of rooms</a>

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
                                    @if (session()->has('warningInsertRoom'))
                                        <div class="alert alert-warning">
                                            <h3>{{ session('warningInsertRoom') }}</h3>
                                        </div>
                                    @endif
                                    @if (session()->has('errorInsertRoom'))
                                        <div class="alert alert-danger">
                                            <h3>{{ session('errorInsertRoom') }}</h3>
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

