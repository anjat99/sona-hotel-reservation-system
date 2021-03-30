@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<form action="#" class="fn-form">
    @csrf
    <input type="email" placeholder="Email" id="emailNews" />
    <p class="text-danger msgError"></p>
    <button type="submit" id="btnSendNews"><i class="fa fa-send"></i></button>
</form>


@if(session()->has('successSendNews'))
    <div class="alert alert-success">
        <h3>{{session('successSendNews') }}</h3>
    </div>
@endif
@if (session()->has('warningSendNews'))
    <div class="alert alert-warning">
        <h3>{{ session('warningSendNews') }}</h3>
    </div>
@endif
@if (session()->has('errorSendNews'))
    <div class="alert alert-danger">
        <h3>{{ session('errorSendNews') }}</h3>
    </div>
@endif
