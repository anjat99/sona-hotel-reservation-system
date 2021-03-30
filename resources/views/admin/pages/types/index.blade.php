@extends('layouts.admin')

@section('title')
    Sona | Types of rooms
@endsection

@section('description')
    Website for reservation hotel rooms - Information about types of rooms and managing types
@endsection

@section('keywords')
    admin panel, types
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h5 class="card-category">Total Shipments</h5>
                                <h2 class="card-title">Types of rooms - Management</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                    <a href="#" class="btn btn-sm btn-primary btn-simple active" id="btnShowFormAddType">ADD TYPE OF ROOM</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive menu_table" id="typesTable">
                            {{--                            @dd($roomTypes)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        TYPE OF ROOM
                                    </th>
                                    <th class="text-center">
                                        MAX CAPACITY OF PEOPLE
                                    </th>
                                    <th class="text-center">
                                        QUANTITY OF AVAILABLE ROOMS
                                    </th>
                                    <th class="text-center">
                                        EDIT
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roomTypes as $t)
                                    <tr>
                                        <td class="text-center">
                                            {{ $t->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $t->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $t->capacity }}
                                        </td>
                                        <td class="text-center">
                                            {{ $t->availabilityType->quantity }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('types.edit', $t->id ) }}" class="btnEditRoomService" data-id="{{ $t->id }}">
                                                <i class="fas fa-edit adminIcons"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $roomTypes->links() }}
                        </div>
                        <div class="container mt-3">
                            @if (session()->has('successUpdateType'))
                                <div class="alert alert-success">
                                    <h3>{{ session('successUpdateType') }}</h3>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-12 d-flex justify-content-between">
                            @include('admin.pages.types.add')
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('adminScripts')
    <script src="{{ asset('assets/js/myScripts/adminScripts/admin_types.js') }}"></script>
@endsection
