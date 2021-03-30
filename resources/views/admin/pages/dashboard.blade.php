@extends('layouts.admin')

@section('title')
    Sona | Dashboard
@endsection

@section('description')
    Website for reservation hotel rooms.
@endsection

@section('keywords')
    admin panel, dashboard
@endsection

{{--@dd($activities)--}}
{{--@dd($users)--}}
@section('content')

<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header ">
          <div class="row">
              <div class="col-sm-6 text-left">
                  <h2 class="card-title font-weight-bold text-uppercase ">DASHBOARD - ACTIVITIES</h2>
              </div>

          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive menu_table" id="menuTable">
                <table class="table tablesorter " id="dash_table">
                    <thead class="text-primary">
                    <tr>
                        <th class="text-center">
                            FROM (IP ADDRESS)
                        </th>
                        <th class="text-center">
                            EMAIL
                        </th>
                        <th class="text-center">
                            ROLE
                        </th>
                        <th class="text-center">
                            ACTIVITY
                        </th>
                        <th class="text-center">
                            DATE
                        </th>
                    </tr>
                    </thead>
                    <tbody id="activities">

                    @foreach($activities as $a)

                        <tr>
                            <td class="text-center">
                                {{$a->ip_address }}
                            </td>
                            <td class="text-center">
                                {{$a->user->email }}
                            </td>
                            @if($a->user->role_id == 2)
                            <td class="text-center">
                               user
                            </td>
                            @else
                                <td class="text-center">
                                    admin
                                </td>
                            @endif
                            <td class="text-center">
                                {{ $a->activity }}
                            </td>
                            <td class="text-center">
                                {{ $a->date }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-4" id="paging">
                {{ $activities->links() }}

            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-chart">
        <div class="card-header d-flex justify-content-between">
          <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> Latest Registred Users</h3>
            <a href="{{ route('users.index') }}" class="btn">View all</a>
        </div>
        <div class="card-body">
          <div class="card">
              <div class="table-responsive menu_table" id="menuTable">
                  <table class="table tablesorter ">
                      <thead class="text-primary">
                      <tr>
                          <th class="text-center">
                              FULLNAME
                          </th>
                          <th class="text-center">
                              EMAIL
                          </th>
                          <th class="text-center">
                              DATE OF REGISTERED
                          </th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                      <tr>
                          <td class="text-center">
                              {{ $user->firstname ." ".$user->lastname }}
                          </td>
                          <td class="text-center">
                              {{ $user->email }}
                          </td>
                          <td class="text-center">
                              {{ $user->created_at }}
                          </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


