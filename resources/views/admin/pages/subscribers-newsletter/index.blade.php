@extends('layouts.admin')

@section('title')
    Sona | Subscribers
@endsection

@section('description')
    Website for reservation hotel rooms - Information about subscribers of newsletter
@endsection

@section('keywords')
    admin panel, subscribers, newsletter
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h2 class="card-title">Subscribers of a Newsletter</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive menu_table" id="subscriberTable">
                            {{--                            @dd($subscribers)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        EMAIL
                                    </th>
                                    <th class="text-center">
                                        DATE OF SUBSCRIBED
                                    </th>
                                    <th class="text-center">
                                        DELETE SUBSCRIBER
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribers as $s)
                                    <tr>
                                        <td class="text-center">
                                            {{ $s->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $s->email }}
                                        </td >
                                        <td class="text-center">
                                            {{ $s->created_at }}
                                        </td>
                                        <td class="text-center">
                                            <form method="POST" action="{{ route("subscribes.destroy",$s->id) }}">
                                                @method("DELETE")
                                                @csrf
                                                <button class="btn btn-danger btn-xs"><i class="fas fa-trash-alt fa-xs"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $subscribers->links() }}
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
