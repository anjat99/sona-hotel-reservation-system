@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


<form action="#" class="contact-form">
    @csrf
    <div class="row">
        @if(session()->has('user'))
            <div class="col-lg-6">
                <input type="text" disabled id="tbNameContact" name="tbNameContact" data-field="name"  value="{{ session()->get('user')->firstname ." ". session()->get('user')->lastname}}">
                <p class="text-danger msgErrorName"></p>
            </div>
            <div class="col-lg-6">
                <input type="text" disabled data-field="email" id="tbEmailContact" name="tbEmailContact"  value="{{ session()->get('user')->email }}">
                <p class="text-danger msgErrorEmail"></p>

            </div>
        @else
            <div class="col-lg-6">
                <input type="text" id="tbNameContact" name="tbNameContact" data-field="name"  placeholder="Your Name">
                <p class="text-danger msgErrorName"></p>
            </div>
            <div class="col-lg-6">
                <input type="text" data-field="email" id="tbEmailContact" name="tbEmailContact" placeholder="Your Email">
                <p class="text-danger msgErrorEmail"></p>
            </div>
        @endif
        <div class="col-lg-12">
            <input type="text" data-field="subject"  id="tbSubjectContact" name="tbSubjectContact" placeholder="The contacting reason">
            <p class="text-danger msgErrorSubj"></p>
        </div>
        <div class="col-lg-12">
            <textarea data-field="message"  id="taMessageContact" name="taMessageContact" placeholder="Your Message"></textarea>
            <p class="text-danger msgErrorMessage"></p>
            <button id="btnSendMessage" type="submit">Send message</button>
        </div>

    </div>
</form>

@section('javascript')
    <script src="{{ asset("assets/js/myScripts/contact.js") }}">
    </script>
@endsection

