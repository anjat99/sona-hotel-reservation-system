
@extends('layouts.admin')

@section('title')
    Sona | Testimonials written by users
@endsection

@section('description')
    Website for reservation hotel rooms - Information about testimonials on hotel
@endsection

@section('keywords')
    admin panel, testimonial
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
                                    <td class="text-white head__table">ROLE - USER NAME</td>
                                    <td>
                                        <div class="main__table-text">{{ $testimonial->user->role->name }} - {{ $testimonial->user->firstname ." ". $testimonial->user->lastname }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">SUMMARY</td>
                                    <td>
                                        <div class="main__table-text">{{ $testimonial->description }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">DATE OF SENT</td>
                                    <td>
                                        <div class="main__table-text">{{ $testimonial->created_at }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table" colspan="2">
                                        <a href="{{ route('testimonials.index') }}" class="btn btn-dark ml-2"><i class="fa fa-arrow-left"></i>  Back to list of testimonials</a>
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
