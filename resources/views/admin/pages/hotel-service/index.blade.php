@extends('layouts.admin')

@section('title')
    Sona | Hotel services
@endsection

@section('description')
    Website for reservation hotel rooms - Information about hotel services
@endsection

@section('keywords')
    admin panel, hotel services
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h2 class="card-title">Hotel Service Management</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                    <a href="#" class="btn btn-sm btn-primary btn-simple active">ADD HOTEL SERVICE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            @if (session()->has('errorDeleteHService'))
                                <div class="alert alert-success">
                                    <h3>{{ session('errorDeleteHService') }}</h3>
                                </div>
                            @endif
                        <div class="table-responsive menu_table" id="hotelServiceTable">
                            {{--                            @dd($hotelServices)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        ICON/IMAGE
                                    </th>
                                    <th class="text-center">
                                        TITLE
                                    </th>
                                    <th class="text-center">
                                        DESCRIPTION
                                    </th>
                                    <th class="text-center">
                                        ACTIONS
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hotelServices as $hs)
                                    <tr>
                                        <td class="text-center">
                                            {{ $hs->id }}
                                        </td>
                                        <td class="text-center">
{{--                                            <span><i class="{{ $hs->img }}"></i></span>--}}
                                            <img width="50" height="50" src="{{ asset('/storage/assets/img/hotel-services/'.$hs->img) }}" alt="{{ $hs->title }}" />
                                        </td>
                                        <td class="text-center">
                                            {{ $hs->title }}
                                        </td >
                                        <td class="text-center">
                                            @php
                                                if(strlen($hs->description)<=70){
                                                    echo $hs->description;
                                                }else{
                                                    $hs->description=substr($hs->description,0,70) . '...';
                                                        echo $hs->description;
                                                }

                                            @endphp
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('hotel-services.edit', $hs->id ) }}" class="btnEditHotelService" data-id="{{ $hs->id }}"> <i class="fas fa-edit adminIcons"></i> </a>
                                            <form method="POST" action="{{ route("hotel-services.destroy",$hs->id) }}">
                                                @method("DELETE")
                                                @csrf
                                                <button class="btn btn-xs"><i class="fas fa-trash-alt fa-xs adminIcons"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $hotelServices->links() }}
                        </div>
                        @if (session()->has('successEditHService'))
                            <div class="alert alert-success">
                                <h3>{{ session('successEditHService') }}</h3>
                            </div>
                        @endif
                        <div class="col-lg-12 d-flex justify-content-between">
                            @include('admin.pages.hotel-service.add')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
