@extends('layouts.admin')

@section('title')
    Sona | Menus
@endsection

@section('description')
    Website for reservation hotel rooms - Information about navigation menu links
@endsection

@section('keywords')
    admin panel, navigation manu links
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h2 class="card-title font-weight-bold text-uppercase ">Menu Links</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                    <a href="#navlink" id="btnShowFormAddNavlink" class="btn btn-sm btn-primary btn-simple active">ADD MENU LINK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive menu_table" id="menuTable">
                            {{--                            @dd($menus)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        NAME
                                    </th>
                                    <th class="text-center">
                                        PATH
                                    </th>
                                    <th class="text-center">
                                        ORDER OF LINK
                                    </th>
                                    <th class="text-center">
                                        EDIT
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menus as $m)
                                    <tr>
                                        <td class="text-center">
                                            {{ $m->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ strtoupper($m->name)  }}
                                        </td>
                                        <td class="text-center">
                                            {{ $m->url }}
                                        </td >
                                        <td class="text-center">
                                            {{ $m->order }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('menus.edit', $m->id ) }}" class="btnEditMenuLink" data-id="{{ $m->id }}"> <i class="fas fa-edit adminIcons"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $menus->links() }}
                        </div>
                        <div class="container mt-3">
                            @if (session()->has('successUpdateMenu'))
                                <div class="alert alert-success">
                                    <h3>{{ session('successUpdateMenu') }}</h3>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-12 d-flex justify-content-between">
                            @include('admin.pages.menu.add')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('adminScripts')
    <script src="{{ asset('assets/js/myScripts/adminScripts/admin_menu.js') }}"></script>
@endsection
