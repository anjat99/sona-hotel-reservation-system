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

{{--@dd($room)--}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <div class="container mt-3">
                            <div class="row d-flex justify-content-center align-content-between col-lg-12">
                                <div class="col-lg-8">
                                    <form action="{{ route('rooms-manage.update', $room->id) }}" method="POST" class="contact-form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row d-flex justify-content-center align-content-between">
                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                                <h2 class="mb-0">UPDATE ROOM</h2>
                                            </div>
                                            <div class="col-sm-12 d-flex">
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">ROOM NAME</p>
                                                    <input type="text" class="form-control adminForm" name="name" id="tbFirstNameUpdate" value="{{ $room->name }}">
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">SIZE OF ROOM</p>
                                                    <input type="number" min="10" max="100" class="form-control adminForm" name="size"  id="tbUpdateCapacity" value="{{ $room->size }}">
                                                </div>
                                            </div>
                                            <div class="form-group purple-border col-sm-11 mt-2">
                                                <p class="text-black font-weight-bold">DESCRIPTION</p>
                                                <textarea class="form-control adminForm" name="description"  id="taDescriptionUpdate">{{ $room->description }}</textarea>
                                            </div>

                                            <div class="col-sm-12 d-flex">
                                                <div class="form-group col-sm-6 mb-2 mt-2">
                                                    <p class="text-black font-weight-bold">CHOOSE PRICE:</p>
                                                    <select class="form-control adminFormWhite" id="ddlRolesUserUpdate" name="price">
                                                        @foreach($prices as $p)
                                                            <option value="{{ $p->id }}" {{ $p->id == $room->price_id ? "selected" : "" }}>{{$p->price}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6 mb-2 mt-2">
                                                    <p class="text-black font-weight-bold">CHOOSE TYPE:</p>
                                                    <select class="form-control adminFormWhite" id="ddlRolesUserUpdate" name="type">
                                                        @foreach($types as $t)
                                                            <option value="{{ $t->id }}" {{ $t->id == $room->availabilityType->type_id ? "selected" : "" }}>{{$t->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 d-flex mb-3">
                                                <div class="col-sm-6 mt-3 d-flex justify-content-center">
                                                    <img src="{{ asset('/storage/assets/img/room/'.$room->image->path) }}" alt="{{ $room->name }}" width="100" height="100" class="img-fluid" >
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <p class="text-black font-weight-bold">IMAGE</p>
                                                    <input type="file"  class="form-control adminForm" name="image"  id="image">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 d-flex flex-wrap justify-content-center align-items-center">
                                                <div class="col-sm-6 mt-3 d-flex flex-column">

                                                    <div class="form-check ml-5 mt-0">
                                                        <p class="text-black font-weight-bold mb-2">SERVICES</p>

                                                        @foreach($services as $service)
                                                            <input type="checkbox" class="form-check-input" id="service{{ $service->id }}" name="service[]" value="{{ $service->id }}"
                                                                   @if(isset($room) && in_array($service->id, $room->services()->pluck('service_id')->toArray()))
                                                                        checked
                                                                   @elseif(is_array(old('service_id')) && in_array($service->id, old('service_id')))
                                                                        checked
                                                                    @endif
                                                            />
                                                            <label class="form-check-label" for="service{{ $service->id }}">{{ $service->name }}</label> <br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 d-flex flex-column align-items-center">
                                                    <p class="text-black font-weight-bold">QUANTITY ROOMS</p>
                                                    <input type="number" min="0" max="20" class="form-control adminForm" name="quantity"  id="quantity" value="{{ $room->availabilityType->quantity }}">
                                                </div>

                                            </div>


                                            <div class="col-sm-12 mb-2 mt-4 d-flex justify-content-center">

                                                <input type="submit" class="btn btn-warning btnSubmitA" name="btnUpdateUser" id="btnUpdateUser" value="Update room" />
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
                                    @if (session()->has('warningUpdateRoom'))
                                        <div class="alert alert-warning">
                                            <h3>{{ session('warningUpdateRoom') }}</h3>
                                        </div>
                                    @endif
                                    @if (session()->has('errorUpdateRoom'))
                                        <div class="alert alert-danger">
                                            <h3>{{ session('errorUpdateRoom') }}</h3>
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

