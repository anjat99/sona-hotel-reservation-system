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


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h2 class="card-title">Messages Management</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive menu_table" id="messagesTable">
                            {{--                            @dd($messages)--}}
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
                                        EMAIL
                                    </th>
                                    <th class="text-center">
                                        SUBJECT
                                    </th>
                                    <th class="text-center">
                                        MESSAGE
                                    </th>
                                    <th class="text-center">
                                        DATE OF SENT
                                    </th>
                                    <th class="text-center">
                                        IS READ ?
                                    </th>
                                    <th class="text-center">
                                        ACTIONS
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $m)
                                    <tr>
                                        <td class="text-center">
                                            {{ $m->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $m->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $m->email }}
                                        </td >
                                        <td class="text-center">
                                            {{ $m->subject }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                if(strlen($m->message)<=50){
                                                    echo $m->message;
                                                }else{
                                                    $m->message=substr($m->message,0,50) . '...';
                                                        echo $m->message;
                                                }

                                            @endphp
                                        </td>

                                        <td class="text-center">
                                            {{ $m->created_at }}
                                        </td>
                                        <td class="text-center">
                                            @if($m->is_read == 0)
                                                UNREAD
                                            @else
                                                READ
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('messages.show', $m->id ) }}" class="btnViewMessage" data-id="{{ $m->id }}"> <i class="fas fa-info-circle adminIcons"></i> </a>
                                            <form method="POST" action="{{ route("messages.destroy",$m->id) }}">
                                                @method("DELETE")
                                                @csrf
                                                <button class="btn-danger btnDeleteMessage"><i class="fas fa-trash-alt"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            {{ $messages->links() }}
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
