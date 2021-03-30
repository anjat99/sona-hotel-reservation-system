@extends('layouts.admin')

@section('title')
    Sona | Types of rooms
@endsection

@section('description')
    Website for reservation hotel rooms - Information about types of rooms and managing types
@endsection

@section('keywords')
    admin panel, types, type editing
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
                                <div>
                                    <form action="{{ route('types.update',  $type->id) }}"  method="POST" class="contact-form update-type">
                                        @csrf
                                        @method('PUT')
                                        <div class="row d-flex justify-content-center align-content-between">
                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                                <h2 class="mb-0">Update type of room</h2>
                                            </div>
                                            <div class="col-sm-8 mt-3">
                                                <p class="text-black font-weight-bold">Name of type of room</p>
                                                <input type="text" class="form-control adminForm" name="type" id="tbNameTypeUpdate" value="{{ $type->name }}">
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-black font-weight-bold">max capacity of people</p>
                                                <input type="number" min="0" max="50" class="form-control adminForm" name="capacity"  id="tbUpdateCapacity" value="{{ $type->capacity }}">
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-black font-weight-bold">Quantity</p>
                                                <input type="number" min="0" max="50" class="form-control adminForm" name="quantity"  id="tbUpdateQuantity" value="{{ $type->availabilityType->quantity }}" >
                                            </div>
                                            <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">
                                                <input type="submit" class="btn btn-warning btnSubmitA" name="btnUpdateRoomType" id="btnUpdateRoomType" value="Update type" />
                                                <a href="{{ route('types.index') }}" class="btn btn-dark ml-3"><i class="fa fa-arrow-left"></i>  Back to list of types</a>
                                            </div>
                                        </div>
                                    </form>
                                    @if (session()->has('errorUpdateType'))
                                        <div class="alert alert-info">
                                            <h3>{{ session('errorUpdateType') }}</h3>
                                        </div>
                                    @endif
                                    @if (session()->has('warningUpdateType'))
                                        <div class="alert alert-warning">
                                            <h3>{{ session('warningUpdateType') }}</h3>
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
