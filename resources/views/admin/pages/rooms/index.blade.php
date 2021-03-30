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

{{--@dd($rooms)--}}
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h2 class="card-title">Room Management</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">

                                </div>
                                <a href="{{ route('rooms-manage.create') }}" class="btn btn-sm btn-primary btn-simple ">ADD NEW ROOM</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session()->has('successInsertRoom'))
                            <div class="alert alert-success">
                                <h3>{{ session('successInsertRoom') }}</h3>
                            </div>
                        @endif
                            @if (session()->has('successUpdateRoom'))
                                <div class="alert alert-success">
                                    <h3>{{ session('successUpdateRoom') }}</h3>
                                </div>
                            @endif
                            @if (session()->has('errorDeleteRoom'))
                                <div class="alert alert-info">
                                    <h3>{{ session('errorDeleteRoom') }}</h3>
                                </div>
                            @endif
                            @if (session()->has('warningDeleteRoom'))
                                <div class="alert alert-warning">
                                    <h3>{{ session('warningDeleteRoom') }}</h3>
                                </div>
                            @endif
                            @if (session()->has('successDeleteRoom'))
                                <div class="alert alert-success">
                                    <h3>{{ session('successDeleteRoom') }}</h3>
                                </div>
                            @endif
                        <div class="table-responsive menu_table" id="roomTable">
                            {{--                                                        @dd($rooms)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        COVER
                                    </th>
                                    <th class="text-center">
                                        NAME OF ROOM
                                    </th>
                                    <th class="text-center">
                                        TYPE
                                    </th>
                                    <th class="text-center">
                                        PRICE/NIGHT
                                    </th>
                                    <th class="text-center">
                                        NO.REVIEWS
                                    </th>
                                    <th class="text-center">
                                       RATING
                                    </th>
                                    <th class="text-center">
                                        AVAILABLE
                                    </th>
                                    <th class="text-center">
                                        ACTIONS
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rooms as $r)
                                    @php

                                        $total = 0;
                                    foreach ($r->ratingRooms  as $rate){
                                        $total += $rate->value;

                                    }
                                     $avgRate = 0;
                                    if(count($r->ratingRooms)){
                                        $avgRate =  $total/count($r->ratingRooms);
                                    }

                                    @endphp

                                    <tr>
                                        <td class="text-center">
                                            {{ $r->id }}
                                        </td>
                                        <td class="text-center">
                                            <img width="120" height="120" src="{{ asset('/storage/assets/img/room/'.$r->image->path) }}" alt="{{ $r->name }}" />
                                        </td>
                                        <td class="text-center">
                                            {{ $r->roomName }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->typeName }} room
                                        </td>
                                        <td class="text-center">
                                            {{ $r->price }}
                                        </td>
                                        <td class="text-center">
                                            <i class="far fa-comments"></i> {{ count($r->reviews) }}
                                        </td>
                                        <td class="text-center">
                                            <i class="fa fa-star"></i> {{ round($avgRate) }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->availabilityType->quantity }}
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('rooms-manage.edit', $r->id ) }}" class="btnEditUser" data-id="{{ $r->id }}">
                                                <i class="fas fa-edit adminIcons"></i>
                                            </a>
                                            <a href="{{ route('rooms-manage.show', $r->id ) }}" class="btnViewUser" data-id="{{ $r->id }}"> <i class="fas fa-info-circle adminIcons"></i> </a>
                                            <form method="POST" action="{{ route('rooms-manage.destroy', $r->id ) }}">
                                                @method("DELETE")
                                                @csrf
                                                <button class="btn"><i class="fas fa-trash-alt adminIcons"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $rooms->links() }}
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
