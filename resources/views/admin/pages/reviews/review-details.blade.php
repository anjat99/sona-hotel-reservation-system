
@extends('layouts.admin')

@section('title')
    Sona | Reviews
@endsection
@section('description')
    Website for reservation hotel rooms - Information about reviews
@endsection

@section('keywords')
    admin panel, reviews
@endsection

{{--@dd($type)--}}
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
                                        <div class="main__table-text">{{ $review->rooms->first()->name }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">USER</td>
                                    <td>
                                        <div class="main__table-text">{{ $review->user->email }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">REVIEW</td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">{{ $review->message }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">DATE OF REVIEW</td>
                                    <td>
                                        <div class="main__table-text">{{ $review->created_at }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table" colspan="2">
                                        <a href="{{ route('reviews.index') }}" class="btn btn-dark ml-2"><i class="fa fa-arrow-left"></i>  Back to list of reviews</a>
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
