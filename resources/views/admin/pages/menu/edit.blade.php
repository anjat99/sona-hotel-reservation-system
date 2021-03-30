@extends('layouts.admin')

@section('title')
    Sona | Menu
@endsection

@section('description')
    Website for reservation hotel rooms - Information about navigation menu links
@endsection

@section('keywords')
    admin panel, navigation manu links
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
                                    <form action="{{ route('menus.update',  $menu->id) }}" method="POST" class="contact-form update-navlink">
                                        @csrf
                                        @method('PUT')
                                        <div class="row d-flex justify-content-center align-content-between">
                                            <div class="col-sm-10   mb-3 d-flex justify-content-center">
                                                <h2 class="mb-0">Update navlink</h2>
                                            </div>
                                            <div class="col-sm-8 mt-3">
                                                <p class="text-black font-weight-bold">Name of navlink</p>
                                                <input type="text" class="form-control adminForm" name="tbName" id="tbName"  value="{{ $menu->name }}">
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-black font-weight-bold">Url of navlink</p>
                                                <input type="text" class="form-control adminForm" name="tbUrl"  id="tbUrl"  value="{{ $menu->url }}">
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-black font-weight-bold">Order of navlink</p>
                                                <input type="number" min="0" max="50" class="form-control adminForm" name="tbOrder"  id="tbOrder" value="{{ $menu->order }}">
                                            </div>
                                            <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">
                                                <input type="submit" class="btn btn-warning btnSubmitA"  value="Update navlink" />
                                             <a href="{{ route('menus.index') }}" class="btn btn-dark ml-3"><i class="fa fa-arrow-left"></i>  Back to list of menus</a>
                                            </div>
                                        </div>
                                    </form>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session()->has('errorUpdateMenu'))
                                        <div class="alert alert-danger">
                                            <h3>{{ session('errorUpdateMenu') }}</h3>
                                        </div>
                                    @endif
                                    @if (session()->has('warningUpdateMenu'))
                                        <div class="alert alert-warning">
                                            <h3>{{ session('warningUpdateMenu') }}</h3>
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
