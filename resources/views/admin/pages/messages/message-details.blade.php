
@extends('layouts.admin')

@section('title')
    Sona | Messages
@endsection
@section('description')
    Website for reservation hotel rooms - Information about messages send to admin
@endsection

@section('keywords')
    admin panel, messages
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
                                        <td class="text-white head__table">SENDER NAME</td>
                                        <td>
                                            <div class="main__table-text">{{ $message->name }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-white head__table">SENDER EMAIL</td>
                                        <td>
                                            <div class="main__table-text">{{ $message->email }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-white head__table">SUBJECT</td>
                                        <td>
                                            <div class="main__table-text">{{ $message->subject }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-white head__table">MESSAGE</td>
                                        <td>
                                            <div class="main__table-text main__table-text--green">{{ $message->message }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-white head__table">DATE OF SENT</td>
                                        <td>
                                            <div class="main__table-text">{{ $message->created_at }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-white head__table" colspan="2">
                                            <a href="{{ route('messages.index') }}" class="btn btn-dark ml-2"><i class="fa fa-arrow-left"></i>  Back to list of messages</a>
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
