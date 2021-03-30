@extends('layouts.admin')

@section('title')
    Sona | Services
@endsection

@section('description')
    Website for reservation hotel rooms - Information about room services and managing services
@endsection

@section('keywords')
    admin panel, room services
@endsection

{{--@dd($roomServices)--}}

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h5 class="card-category">Total Shipments</h5>
                                <h2 class="card-title">Service Management</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                    <a href="#" class="btn btn-sm btn-primary btn-simple active" id="btnShowFormAddService">ADD SERVICE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive menu_table" id="roomServiceTable">
{{--                                                        @dd($roomServices)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        Name
                                    </th>
                                    <th class="text-center">
                                        EDIT
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roomServices as $service)
                                    <tr>
                                        <td class="text-center">
                                            {{ $service->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $service->name }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('services.edit',$service->id )}}" class="btnEditRoomService" data-id="{{ $service->id }}">
                                                <i class="fas fa-edit adminIcons"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $roomServices->links() }}
                        </div>
                        @if (session()->has('successEditService'))
                            <div class="alert alert-success">
                                <h3>{{ session('successEditService') }}</h3>
                            </div>
                        @endif
                        <div class="col-lg-12 d-flex justify-content-between">
{{--                            @include('admin.pages.room-services.edit')--}}
                            @include('admin.pages.room-services.add')
                        </div>




{{--                        <div class="container mt-3">--}}
{{--                            <div class="row d-flex justify-content-center align-content-between col-lg-12">--}}
{{--                                <div class="col-lg-7 offset-lg-1">--}}
{{--                                    <form action="#" method="POST" class="contact-form">--}}
{{--                                        <div class="row d-flex justify-content-center align-content-between">--}}
{{--                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">--}}
{{--                                                <h2 class="mb-0">Update room service</h2>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-8 mt-3">--}}
{{--                                                <input type="text" class="form-control adminForm" name="tbNameRSUpdate" id="tbNameRSUpdate" placeholder="Name of room service">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">--}}
{{--                                                <input type="submit" class="btn btn-warning" name="btnUpdateRoomService" id="btnUpdateRoomService" value="Update" />--}}
{{--                                                <input type="button" class="btn btn-dark ml-3" name="btnCancelUpdateRoomService" id="btnCancelUpdateRoomService" value="Cancel" />--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                    @if ($errors->any())--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <ul>--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    @if (session()->has('warning'))--}}
{{--                                        <div class="alert alert-warning">--}}
{{--                                            <h3>{{ session('warning') }}</h3>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    @if (session()->has('success'))--}}
{{--                                        <div class="alert alert-success">--}}
{{--                                            <h3>{{ session('success') }}</h3>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}
{{--                        <div class="container mt-3">--}}
{{--                            <div class="row d-flex justify-content-center align-content-between col-lg-12">--}}
{{--                                <div class="col-lg-7 offset-lg-1">--}}
{{--                                    <form action="#" method="POST" class="contact-form">--}}
{{--                                        <div class="row d-flex justify-content-center align-content-between">--}}
{{--                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">--}}
{{--                                                <h2 class="mb-0">ADD ROOM SERVICE</h2>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-8 mt-3">--}}
{{--                                                <input type="text" class="form-control adminForm" name="tbNameRSAdd" id="tbNameRSAdd" placeholder="Name of room service">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">--}}
{{--                                                <input type="submit" class="btn btn-info" name="btnAddRoomService" id="btnAddRoomService" value="Insert" />--}}
{{--                                                <input type="button" class="btn btn-dark ml-3" name="btnCancelAddRoomService" id="btnCancelAddRoomService" value="Cancel" />--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                    @if ($errors->any())--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <ul>--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    @if (session()->has('warning'))--}}
{{--                                        <div class="alert alert-warning">--}}
{{--                                            <h3>{{ session('warning') }}</h3>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    @if (session()->has('success'))--}}
{{--                                        <div class="alert alert-success">--}}
{{--                                            <h3>{{ session('success') }}</h3>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('adminScripts')
    <script src="{{ asset('assets/js/myScripts/adminScripts/admin_room_services.js') }}"></script>
@endsection
