@extends('layouts.template')

@section('title')
    Rooms
@endsection

@section('description')
    Search for your favourite rooms and rmake reservation by viewing the details of room. But first you will need to login
@endsection

@section('keywords')
    search, filter by type, rooms, types, seervices
@endsection


@section('content')
{{--@dd($rooms)--}}

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section odvoji">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container-fluid d-flex justify-content-between flex-wrap-reverse">
            <div class="row col-lg-9 col-md-12 col-sm-12" id="rooms">



            </div>

{{--            FILTERS--}}
            <div class="row col-lg-3 col-md-12 col-sm-12 d-flex flex-column  text-center mb-5">
                <h3>FIND YOUR SPECIAL ROOM BY SORT AND FILTER IT</h3> <br>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search room">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" disabled>
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <select id="sort" class="form-control">
                            <option value="0" selected disabled>Sort by:</option>
                            <option value="Name ASC">Name ASC</option>
                            <option value="Name DESC">Name DESC</option>
                            <option value="Price ASC">Price ASC</option>
                            <option value="Price DESC">Price DESC</option>
                        </select>
                    </div>
                    <br>
                    <h4>Services:</h4>
                    <div class="form-check">
                        <label class="form-check-label">
                            @foreach($services as $service)
                                <input type="checkbox" name="services[]" class="form-check-input services" id="{{ $service->id }}" value="{{ $service->id }}">{{ $service->name }} <br>
                            @endforeach
                        </label>
                    </div>
                    <br><br>
                    <h4>Types of room:</h4>
                    <div class="form-check">
                        <label class="form-check-label">
                            @foreach($types as $type)
                                <input type="checkbox" class="form-check-input types" name="types[]" id="{{ $type->id }}" value="{{ $type->id }}">{{ $type->name }}  <br>
                            @endforeach
                        </label>
                    </div>
                    <br>
                    {{-- IF checked shows all available rooms --}}
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input freeRooms" data-free="tru" name="freeRooms" id="freeRooms"> SHOW AVAILABLE ROOMS <br>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/myScripts/rooms.js') }}"></script>


@endsection
