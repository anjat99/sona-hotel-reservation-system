@extends('layouts.template')

@section('title')
    About
@endsection

@section('description')
    Information about Sona hotel
@endsection

@section('keywords')
    sona, about, hotel, services, offers
@endsection


@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section odvoji">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>About Us</h2>
                        <div class="bt-option">
                            <a href="./index.html">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- About Us Page Section Begin -->
    <section class="aboutus-page-section spad">
        <div class="container">
            <div class="about-page-text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ap-title">
                            <h2>Welcome To Sona.</h2>
                            <p>Built in 1910 during the Belle Epoque period, this hotel is located in the center of London, with easy access to the city’s tourist attractions. It offers tastefully decorated rooms. Make London your own at Strand Palace. Situated in the heart of London, easily accessible from the City, Docklands and Trafalgar Square, we offer an unbeatable location. We are within walking distance from Covent Garden, Charing Cross, Holborn and Embankment underground stations. Discover world-famous landmarks including St. Paul’s Cathedral, Trafalgar Square, and the London Eye on the banks of the River Thames.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <ul class="ap-services">
                            @foreach ($hotelServices as $hs)
                                <li><i class="icon_check"></i> {{ $hs->title }}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>


            <div class="about-page-services">
                <div class="row">
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="{{ asset('assets/img/about/about_3.jpg') }}">
                            <div class="api-text">
                                <h3>Save 15% on stays more than 3 nights</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="{{ asset('assets/img/about/about_1.jpg') }}">
                            <div class="api-text">
                                <h3>Save 20% on four or more nights </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="{{ asset('assets/img/about/about-p1.jpg') }}">
                            <div class="api-text">
                                <h3>10 Night Saver – 30% Off</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Page Section End -->

@endsection
