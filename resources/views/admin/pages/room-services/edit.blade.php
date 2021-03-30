@extends('layouts.admin')

@section('title')
    Sona | Services
@endsection

@section('description')
    Website for reservation hotel rooms - Information about room services and managing services
@endsection

@section('keywords')
    admin panel, room services
@endsection

{{--@dd($type)--}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <div class="container-fluid mt-4">
                            <div class="row d-flex justify-content-center align-content-between col-lg-12">
                                <div >
                                    <form action="{{ route('services.update', $service->id) }}" method="POST" class="contact-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="row d-flex justify-content-center align-content-between">
                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                                <h2 class="mb-0">Update room service</h2>
                                            </div>
                                            <div class="col-sm-8 mt-3">
                                                <p class="text-black font-weight-bold">Room service</p>
                                                <input type="text" class="form-control adminForm" name="name" id="tbNameRSUpdate" value="{{ $service->name }}">
                                            </div>
                                            <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">
                                                <input type="submit" class="btn btn-warning" name="btnUpdateRoomService" id="btnUpdateRoomService" value="Update" />
                        {{--                        <input type="button" class="btn btn-dark ml-3" name="btnCancelUpdateRoomService" id="btnCancelUpdateRoomService" value="Cancel" />--}}
                                                <a href="{{ route('services.index') }}" class="btn btn-dark ml-3"><i class="fa fa-arrow-left"></i>  Back to list of services</a>
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
                                    @if (session()->has('errorEditService'))
                                        <div class="alert alert-warning">
                                            <h3>{{ session('errorEditService') }}</h3>
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
