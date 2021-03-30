@extends('layouts.admin')

@section('title')
    Sona | Booking
@endsection

@section('description')
    List of details about reservations made by users
@endsection

@section('keywords')
    booking, reservations, list
@endsection

{{--@dd($reservations)--}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h2 class="card-title font-weight-bold text-uppercase ">RESERVATION DETAILS</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-3">
                        <div class="table-responsive menu_table" id="testimonialsTable">
                            {{--                                                        @dd($testimonials)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center ">
                                        NO.
                                    </th>
                                    <th class="text-center">
                                        USER WHO MADE RESERVATION
                                    </th>
                                    <th class="text-center">
                                        BOOKED ON NAME
                                    </th>
                                    <th class="text-center">
                                        ROOM NAME
                                    </th>
                                    <th class="text-center">
                                       TYPE OF ROOM
                                    </th>
                                    <th class="text-center">
                                       NO. OF PEOPLE
                                    </th>
                                    <th class="text-center">
                                        PRICE/NIGHT
                                    </th>
                                    <th class="text-center">
                                        CHECK IN
                                    </th>
                                    <th class="text-center">
                                        CHECK OUT
                                    </th>
                                    <th class="text-center">
                                        NO.DAYS OF STAYING
                                    </th>
                                    <th class="text-center">
                                        TOTAL PRICE
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservations as $key => $r)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$key }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->user->firstname ." ". $r->user->lastname }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->name }}
                                        </td>

                                        <td class="text-center">
                                            {{ $r->room->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->room->availabilityType->type->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->no_people }}
                                        </td>
                                        <td class="text-center">
                                           {{ $r->room->price->price }} $
                                        </td>
                                        <td class="text-center">

                                            {{ $r->check_in }}
                                        </td>
                                        <td class="text-center">

                                            {{ $r->check_out }}
                                        </td>
                                        <td class="text-center">

                                            @php

                                                $seconds_check_in = strtotime($r->check_in);
                                                $seconds_check_out = strtotime($r->check_out);
                                                $datediff = $seconds_check_out - $seconds_check_in;
                                                $days = floor($datediff / (60 * 60 * 24));
                                                echo $days;

                                            @endphp
                                        </td>
                                        <td class="text-center">
                                            {{ $r->sum_price }}$
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            {{ $reservations->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
