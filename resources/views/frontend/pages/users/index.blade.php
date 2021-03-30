@extends('layouts.template')

@section('title') User page @endsection
@section('description') Details about current user's profile, about reservations, reviews and written testimonials @endsection
@section('keywords') user profile, details about reservations @endsection

{{--@dd(session('user'))--}}
@section('content')
 @php
     $u = session('user');
 @endphp

    <section class="rooms-section spad odvoji">
        <div class="container-fluid d-flex justify-content-between ">
            <div class="row col-lg-3 col-md-12 col-sm-12 d-flex flex-column  text-center d-flex justify-content-start position-fixed sidebarNav">
                <h3>MANAGE</h3>
                <nav>
                    <ul id="userNav" class="mt-4 mb-4">
                        <li>
                            <a href="#profile" class="userSectionLink">PROFILE</a>
                        </li>
                        <li>
                            <a href="#reviews" class="userSectionLink">REVIEWS</a>
                        </li>
                        <li>
                            <a href="#testimonials" class="userSectionLink">TESTIMONIALS</a>
                        </li>
                        <li>
                            <a href="#reservations" class="userSectionLink">RESERVATIONS </a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="row col-lg-9 col-md-12 col-sm-12 border border d-flex flex-column justify-content-center align-items-center ml-auto" id="main__section__user">

                @include('frontend.pages.users.profile.profile')

                @include('frontend.pages.users.reviews.reviews')


                @include('frontend.pages.users.testimonials.testimonials')


                @include('frontend.pages.users.reservations.reservations')




            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
@endsection
@section('javascript')
    <script>
        var section = "#profile"
        if(localStorage.getItem('section') != null && localStorage.getItem('section') != "#profile")
        {
            section = localStorage.getItem('section')
        }
    </script>
    <script src="{{ asset("assets/js/myScripts/userPage.js") }}">
    </script>
@endsection
