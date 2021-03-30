@extends('layouts.admin')

@section('title')
    Sona | Testimonials written by users
@endsection

@section('description')
    Website for reservation hotel rooms - Information about testimonials on hotel
@endsection

@section('keywords')
    admin panel, testimonials
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-chart">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h2 class="card-title">Testimonials Details</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive menu_table" id="testimonialsTable">
                            {{--                                                        @dd($testimonials)--}}
                            <table class="table tablesorter">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #ID
                                    </th>
                                    <th class="text-center">
                                        USER
                                    </th>
                                    <th class="text-center">
                                        SUMMARY
                                    </th>
                                    {{--                                    <th class="text-center">--}}
                                    {{--                                        RATE OF HOTEL--}}
                                    {{--                                    </th>--}}
                                    <th class="text-center">
                                        DATE OF SENT
                                    </th>
                                    <th class="text-center">
                                        INFO
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($testimonials as $test)
                                    <tr>
                                        <td class="text-center">
                                            {{ $test->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $test->user->firstname ." ". $test->user->lastname}}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                if(strlen($test->description)<=50){
                                                    echo $test->description;
                                                }else{
                                                    $test->description=substr($test->description,0,50) . '...';
                                                        echo $test->description;
                                                }

                                            @endphp
                                        </td >
                                        {{--                                        <td class="text-center">--}}
                                        {{--                                            {{ $test->grade }}--}}
                                        {{--                                        </td>--}}
                                        <td class="text-center">
                                            {{ $test->created_at }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('testimonials.show', $test->id ) }}" class="btnViewMessage" data-id="{{ $test->id }}"> <i class="fas fa-info-circle adminIcons"></i> </a>
                                            <form method="POST" action="{{ route('testimonials.destroy', $test->id ) }}">
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
                            {{ $testimonials->links() }}

                        </div>
                        @if (session()->has('errorDeleteTest'))
                            <div class="alert alert-info">
                                <h3>{{ session('errorDeleteTest') }}</h3>
                            </div>
                        @endif
                        @if (session()->has('warningDeleteTest'))
                            <div class="alert alert-warning">
                                <h3>{{ session('warningDeleteTest') }}</h3>
                            </div>
                        @endif
                        @if (session()->has('successDeleteTest'))
                            <div class="alert alert-success">
                                <h3>{{ session('successDeleteTest') }}</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
