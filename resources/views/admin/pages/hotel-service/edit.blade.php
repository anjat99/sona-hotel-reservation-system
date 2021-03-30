@extends('layouts.admin')

@section('title')
    Sona | Hotel Services
@endsection

@section('description')
    Website for reservation hotel rooms - Information about hotel services
@endsection

@section('keywords')
    admin panel, hotel services
@endsection

{{--@dd($type)--}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <div class="container-fluid mt-4">
                            <div class="row d-flex justify-content-center align-content-between">
                                <div>
                                    <form action="{{ route('hotel-services.update', $hotelService->id) }}" method="POST" class="contact-form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row d-flex justify-content-center align-content-between">
                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                                <h2 class="mb-0">Update hotel-service</h2>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-black font-weight-bold">Title</p>
                                                <input type="text" class="form-control adminForm" name="title" id="tbTitleUpdate" value="{{ $hotelService->title }}">
                                            </div>
{{--                                            <div class="col-sm-9 mt-3 mb-2 d-flex justify-content-center align-items-center">--}}

{{--                                                <div class="col-sm-3">--}}
{{--                                                    <span><i class="{{ $hotelService->img }} iconHS"></i></span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-8 d-flex flex-column justify-content-center align-items-center">--}}
{{--                                                    <p class="text-black font-weight-bold">Class of icon</p>--}}
{{--                                                    <input type="text" class="form-control adminForm" name="icon" id="tbTitleUpdate" value="{{ $hotelService->img }}">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-sm-8 d-flex mb-3">
                                                <div class="col-sm-4 mt-3 d-flex justify-content-center">
                                                    <img src="{{ asset('/storage/assets/img/hotel-services/'.$hotelService->img) }}" alt="{{ $hotelService->title }}" width="100" height="100" class="img-fluid" >
                                                </div>
                                                <div class="col-sm-8 mt-3">
                                                    <p class="text-black font-weight-bold">IMAGE</p>
                                                    <input type="file"  class="form-control adminForm" name="image"  id="image">
                                                </div>
                                            </div>

                                            <div class="form-group purple-border col-sm-8 mt-2">
                                                <p class="text-black font-weight-bold">Description</p>
                                                <textarea class="form-control adminForm" name="description"  id="taDescriptionUpdate" >{{ $hotelService->description }}</textarea>
                                            </div>

                                            <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">
                                                <input type="submit" class="btn btn-warning" name="btnUpdateHS" id="btnUpdateHS" value="Update" />
{{--                                                <input type="button" class="btn btn-dark ml-3" name="btnCancelUpdateHS" id="btnCancelUpdateHS" value="Cancel" />--}}
                                                <a href="{{ route('hotel-services.index') }}" class="btn btn-dark ml-3"><i class="fa fa-arrow-left"></i>  Back to list of hotel services</a>
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
                                    @if (session()->has('warningEditHService'))
                                        <div class="alert alert-warning">
                                            <h3>{{ session('warningEditHService') }}</h3>
                                        </div>
                                    @endif
                                    @if (session()->has('errorEditHService'))
                                        <div class="alert alert-success">
                                            <h3>{{ session('errorEditHService') }}</h3>
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

