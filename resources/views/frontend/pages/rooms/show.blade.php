
@extends('layouts.template')

@section('title') Single room @endsection
@section('description') See more info about this item. @endsection
@section('keywords') shop, online, home, best, sellers @endsection
@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

{{--    @dd($room)--}}

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section odvoji">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>{{ $room->roomName }}</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Home</a>
                            <span><a href="{{ route('rooms.index') }}">Rooms</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">

                <div class="@if(session()->has('user') && session('user')->role_id == 2) col-lg-8 @else col-lg-12 @endif ">
                    <div class="room-details-item">
                        <img src="{{ asset('/storage/assets/img/room/'.$room->image->path) }}" alt="{{ $room->roomName }}" class="img-fluid col-12">

                        <div class="rd-text">
                            <div class="rd-title d-flex justify-content-between">
                                <h3>{{ $room->roomName }}</h3>

                                {{--  @dd($ratings)--}}
                                <div class="d-flex justify-content-between">
                                    @if(session()->has('user'))
                                    <div>
                                        @include('frontend.partials.rating-room-form')
                                    </div>
                                    @endif
                                    <div id="rating">
                                        @if(round($ratings) > 0)
                                            <h3 class="btn btn-warning"> <i class="fas fa-star"></i> {{ round($ratings) }} </h3>
                                        @else
                                            <a class="btn btn-danger d-flex align-items-center"> No voted yet!</a>
                                        @endif
                                    </div>
                                </div>

                            </div>



                            <h2>{{ $room->price->price }} $<span>/Per night</span></h2>

                            {{-- DETAILS OF ROOM--}}
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>{{ $room->size }}  m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td><i class="fas fa-female"></i> x{{ $room->capacity }} </td>
                                </tr>
                                <tr>
                                    <td class="r-o">Type of room:</td>
                                    <td>{{ $room->typeName }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>

                                        @forelse ($room->services as $i => $service)

                                            @if($i != count($room->services) - 1)
                                                {{ $service->name }},
                                            @else
                                                {{ $service->name }}
                                            @endif
                                        @empty
                                            No services.
                                        @endforelse
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <p class="f-para">{{ $room->description }}</p>
                        </div>

                    </div>

                    {{-- REVIEWS--}}
                    <div class="rd-reviews d-flex flex-column">
                        <h4 class="float-left">Reviews <i class="far fa-comments"></i> {{ count($reviews) }}</h4>
                        @if(session()->has('user'))
                            <span><a href="#" id="btnShowFormAddReview" class="btn btn-dark mb-3 ml-3"> ADD REVIEW </a></span>
                                <br>
                                <br>

                            @include('frontend.pages.rooms.create-review-form')
                        @endif
                            <div id="reviews">
                                {{-- @dd($room->reviews)--}}

                                @if(count($room->reviews) <= 0)
                                    <p class="text-darker">Currently don't have any review for this room. <br>If you visit this room
                                        of have any reason to, write a review about it.</p>
                                @else
                                    @foreach($room->reviews as $i=>$review)
                                        @include('frontend.pages.rooms.single-review',['user' => $review->user, 'review'=>$review])
                                    @endforeach
                                @endif
                            </div>
                    </div>
                </div>


                {{-- RESERVATION--}}
                @if(session()->has('user') && session('user')->role_id == 2)
                    <div class="col-lg-4" >
                        <div class="room-booking" id="reservation_details">
                            <h3>Make Reservation</h3>

                            <form action="#">
                                @csrf
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <br>

                                <label for="phone">No Phone</label>
                                <input type="number" class="form-control adminForm"  name="phone"  id="phone">
                                <br>
                                <div class="check-date">
                                    <label for="date-in">Check In:</label>
                                    <input type="date" class="date-input" id="date-in" value="in">
{{--                                    <i class="icon_calendar"></i>--}}
                                </div>
                                <br>

                                    <label for="time-in">Choose a time for check in:</label>
                                    <input type="time" id="time-in" name="time-in"
                                           min="08:00" max="22:00" required>



                                <br>  <br>
                                <div class="check-date">
                                    <label for="date-out">Check Out:</label>
                                    <input type="date" class="date-input" id="date-out" value="out">
{{--                                    <i class="icon_calendar"></i>--}}
                                </div>

                                <br>
                                <label for="time-out">Choose a time for check out:</label>
                                <input type="time" id="time-out" name="time-out"  min="08:00" max="15:00" required>
                                <br>  <br>
                                <div class="form-group">
                                    <label for="guest">Guests:</label>
                                    <select class="form-control" id="no-people">
                                        @for($i = 1; $i <= $room->capacity; $i++)
                                            <option value=" {{ $i }}"> {{ $i }} @if($i !== 1) persons @else person @endif</option>

                                        @endfor
                                    </select>
                                </div>

                                <button type="submit" class="btnReservation" id="btnReservation" data-dailyprice="{{ $room->price->price }}" data-room="{{ $room->id }}" data-quantity="{{ $room->availabilityType->quantity }}" data-at="{{ $room->availability_type_id }}">BOOKING NOW </button>
                            </form>
                            <div class="errors text-danger text-center mt-2"></div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
{{--src="{{ asset('assets/js/myScripts/reservation.js') }}"--}}

@endsection

@section('javascript')
    <script src="{{ asset('assets/js/myScripts/rooms.js') }}"></script>
    <script src="{{ asset('assets/js/myScripts/reservation.js') }}"></script>
@endsection


