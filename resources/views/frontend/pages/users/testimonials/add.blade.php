<div class="col-6 text-center">
    <h3>ADD NEW TESTIMONIAL</h3>
    <form action="{{ route('testimonials-manage.store') }}" method="POST">
        @csrf
        <div class="form-group purple-border col-sm-12 mt-2">
            <p class="text-black font-weight-bold">Message</p>
            <textarea class="form-control adminForm" name="description"  id="taDescriptionUpdate"></textarea>
        </div>
        <div class="col-sm-12 mb-2 mt-2 d-flex justify-content-center">
            <input type="submit" class="btn btn-warning" name="btnUpdateUser" id="btnUpdateUser" value="Insert Testimonial" />
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
    @if(session()->has('successAdd'))
        <div class="alert alert-success">
            <h3>{{session('successAdd') }}</h3>
        </div>
    @endif
    @if (session()->has('warningAdd'))
        <div class="alert alert-warning">
            <h3>{{ session('warningAdd') }}</h3>
        </div>
    @endif
</div>
