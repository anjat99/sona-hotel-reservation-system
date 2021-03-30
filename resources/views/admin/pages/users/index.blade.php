@extends('layouts.admin')

@section('title')
    Sona | Users
@endsection

@section('description')
    Website for reservation hotel rooms - Information about registered users and managing users
@endsection

@section('keywords')
    admin panel, users
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
                                <h2 class="card-title">Users Management</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session()->has('errorDeleteUser'))
                            <div class="alert alert-info">
                                <h3>{{ session('errorDeleteUser') }}</h3>
                            </div>
                        @endif
                        @if (session()->has('warningDeleteUser'))
                            <div class="alert alert-warning">
                                <h3>{{ session('warningDeleteUser') }}</h3>
                            </div>
                        @endif
                        @if (session()->has('successDeleteUser'))
                            <div class="alert alert-success">
                                <h3>{{ session('successDeleteUser') }}</h3>
                            </div>
                        @endif
                        <div class="table-responsive menu_table" id="roomPriceTable">
                            {{--                            @dd($users)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        BASIC INFO
                                    </th>
                                    <th class="text-center">
                                        ROLE
                                    </th>
                                    <th class="text-center">
                                        NO.REVIEWS
                                    </th>
                                    <th class="text-center">
                                        NO.TESTIMONIALS
                                    </th>
                                    <th class="text-center">
                                        DATE OF REGISTER
                                    </th>
                                    <th class="text-center">
                                        ACTIONS
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td class="text-center">
                                            {{ $u->id }}
                                        </td>
                                        <td class="text-center">
                                            <div class="menu_table__user">
                                                <div class="menu_table__meta">
                                                    <h3> {{ $u->firstname ." ".$u->lastname }}</h3>
                                                    <span>{{ $u->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $u->role->name }}
                                        </td>
                                        <td class="text-center">
                                            <i class="fas fa-comments"></i> {{ count($u->reviews) }}
                                        </td>
                                        <td class="text-center">
                                            <i class="far fa-comments"></i> {{ count($u->testimonials) }}
                                        </td>

                                        <td class="text-center">
                                            {{ $u->created_at }}
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('users.edit', $u->id ) }}" class="btnEditUser" data-id="{{ $u->id }}">
                                                <i class="fas fa-edit adminIcons"></i>
                                            </a>

                                            <form method="POST" action="{{ route('users.destroy', $u->id ) }}">
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
                            {{ $users->links() }}
                        </div>
                        <div class="container mt-3">
                            @if (session()->has('successUpdateUser'))
                                <div class="alert alert-success">
                                    <h3>{{ session('successUpdateUser') }}</h3>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
