
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
                        <div class="table-responsive menu_table" id="messagesTable">
                            <table class="table tablesorter main__table">
                                <tbody>
                                <tr>
                                    <td class="text-white head__table">ROOM NAME</td>
                                    <td>
                                        <div class="main__table-text">{{ $room->name }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">COVER</td>
                                    <td>
                                        <div class="main__table-text">
                                            <img width="100" height="100" src="{{ asset('/storage/assets/img/room/'.$room->image->path) }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">PRICE/NIGHT</td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">{{ $room->price }}$</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">SIZE</td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">{{ $room->size }}m<sup>2</sup></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">TYPE</td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">{{ $room->typeName }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">SERVICES</td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">
                                                @forelse ($room->services as $i => $service)

                                                    @if($i != count($room->services) - 1)
                                                        {{ $service->name }},
                                                    @else
                                                        {{ $service->name }}
                                                    @endif
                                                @empty
                                                    No services.
                                                @endforelse
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">DESCRIPTION</td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">{{ $room->description }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table" colspan="2">
                                        <a href="{{ route('rooms-manage.index') }}" class="btn btn-dark ml-2"><i class="fa fa-arrow-left"></i>  Back to list of rooms</a>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
