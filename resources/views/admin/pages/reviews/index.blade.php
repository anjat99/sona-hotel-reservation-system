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


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h2 class="card-title">Reviews Management</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive menu_table" id="reviewsTable">
{{--                                                                @dd($reviews)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID REVIEW
                                    </th>
                                    <th class="text-center">
                                        ROOM
                                    </th>
                                    <th class="text-center">
                                        USER
                                    </th>
                                    <th class="text-center">
                                        SUMMARY
                                    </th>
                                    <th class="text-center">
                                        DATE OF POST
                                    </th>
                                    <th class="text-center">
                                        ACTIONS
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
{{--                                    @dd($review->rooms->first()->name)--}}

                                    <tr>
                                        <td class="text-center">
                                            {{ $review->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $review->rooms->first()->name }}

                                        </td>
                                        <td class="text-center">
                                            {{ $review->user->firstname ." ". $review->user->lastname}}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                if(strlen($review->message)<=50){
                                                    echo $review->message;
                                                }else{
                                                    $review->message=substr($review->message,0,50) . '...';
                                                        echo $review->message;
                                                }

                                            @endphp

                                        </td >
                                        <td class="text-center">
                                            {{ $review->created_at }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('reviews.show', $review->id ) }}" class="btnViewReview" data-id="{{ $review->id }}"> <i class="fas fa-info-circle adminIcons"></i> </a>
{{--                                            <a href="{{ route('reviews.destroy', $review->id ) }}" class="btnDeleteReview" data-id="{{ $review->id }}"> <i class="fas fa-trash-alt adminIcons"></i> </a>--}}
                                            <form method="POST" action="{{ route("reviews.destroy",$review->id) }}">
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
                            {{ $reviews->links() }}

                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-info">
                                <h3>{{ session('error') }}</h3>
                            </div>
                        @endif
                        @if (session()->has('warning'))
                            <div class="alert alert-warning">
                                <h3>{{ session('warning') }}</h3>
                            </div>
                        @endif
{{--                        @if (session()->has('success'))--}}
{{--                            <div class="alert alert-success">--}}
{{--                                <h3>{{ session('success') }}</h3>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
