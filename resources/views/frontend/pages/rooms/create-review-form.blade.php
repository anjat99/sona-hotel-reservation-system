{{--@dd($room)--}}
@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


<div class="review-add">
    <form  class="ra-form">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <textarea id="taMessageReview" name="taMessageReview" placeholder="Your Review"></textarea>
                <p class="text-danger msgError" id="msgError"></p>
                <button type="submit" data-room="{{ $room->id }}"  id="btnAddReview">Submit Now</button>
{{--                <div id="popup-review">Successfully sent review!</div>--}}
                <br><br>
            </div>
        </div>

    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning">
            <h3>{{ session('warning') }}</h3>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif

</div>

@section('javascript')
    <script src="{{asset('assets/js/myScripts/rooms.js')}}"></script>
    @endsection

