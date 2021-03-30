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

{{--@dd($menu->name)--}}
@section('content')
    <div class="content">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <div class="container mt-3 col-lg-6">
                             <div class="row d-flex justify-content-center align-content-between">
        <div >
            <form action="{{ route('prices.update',['price'=>$prices->id]) }}" method="POST" class="contact-form update-price">
                @csrf
                @method('PUT')
                <div class="row d-flex justify-content-center align-content-between">
                    <div class="col-sm-10   mb-3 d-flex justify-content-center">
                        <h2 class="mb-0">Update value of price</h2>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-black font-weight-bold">Value of price</p>
                        <input type="text"  class="form-control adminForm" name="price"  id="tbPriceUpdate" value="{{ $prices->price }}">
                    </div>
                    <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">
                        <input type="submit" class="btn btn-warning btnSubmitA"  value="Update price" />
                        <a href="{{ route('prices.index') }}" class="btn btn-dark ml-3"><i class="fa fa-arrow-left"></i>  Back to list of prices</a>
                    </div>
                </div>
            </form>
            @if (session()->has('warning'))
                <div class="alert alert-warning">
                    <h3>{{ session('warning') }}</h3>
                </div>
            @endif
            @if (session()->has('errors'))
                <div class="alert alert-info">
                    <h3>{{ session('errors') }}</h3>
                </div>
            @endif

        </div>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
