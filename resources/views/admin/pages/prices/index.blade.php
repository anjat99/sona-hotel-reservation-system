@extends('layouts.admin')

@section('title')
    Sona | Prices
@endsection

@section('description')
    Website for reservation hotel rooms - Information about prices
@endsection

@section('keywords')
    admin panel, prices
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
                                <h2 class="card-title">Prices Management</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group btn-group-toggle float-right">
                                    <a href="#price" id="btnShowFormAddPrice" class="btn btn-sm btn-primary btn-simple active">ADD NEW PRICE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive menu_table" id="roomPriceTable">
                            {{--                                                        @dd($prices)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        VALUE OF PRICE
                                    </th>
                                    <th class="text-center">
                                        EDIT
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prices as $p)
                                    <tr>
                                        <td class="text-center">
                                            {{ $p->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $p->price }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('prices.edit', $p->id ) }}" class="btnEditRoomService" data-id="{{ $p->id }}">
                                                <i class="fas fa-edit adminIcons"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $prices->links() }}

                        </div>
                        @if (session()->has('successUpdatePrice'))
                            <div class="alert alert-success">
                                <h3>{{ session('successUpdatePrice') }}</h3>
                            </div>
                        @endif
                        <div class="col-lg-12 d-flex justify-content-between">
                            @include('admin.pages.prices.add')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('adminScripts')
    <script src="{{ asset('assets/js/myScripts/adminScripts/admin_prices.js') }}"></script>
@endsection
