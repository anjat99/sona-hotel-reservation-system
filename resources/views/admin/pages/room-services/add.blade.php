<div class="container-fluid mt-4">
    <div class="row d-flex justify-content-center align-content-between col-lg-12">
        <div >
            <form action="{{ route('services.store') }}" method="POST" class="contact-form add-room-service">
                @csrf
                <div class="row d-flex justify-content-center align-content-between">
                    <div class="col-sm-10   mb-3 d-flex justify-content-center">
                        <h2 class="mb-0">ADD ROOM SERVICE</h2>
                    </div>
                    <div class="col-sm-8 mt-3">
                        <p class="text-black font-weight-bold">Room service</p>
                        <input type="text" class="form-control adminForm" name="name" id="tbNameRSAdd" >
                    </div>
                    <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">
                        <input type="submit" class="btn btn-info" name="btnAddRoomService" id="btnAddRoomService" value="Insert" />
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
            @if (session()->has('errorAddService'))
                <div class="alert alert-warning">
                    <h3>{{ session('errorAddService') }}</h3>
                </div>
            @endif

            @if (session()->has('successAddService'))
                <div class="alert alert-success">
                    <h3>{{ session('successAddService') }}</h3>
                </div>
            @endif
        </div>
    </div>
</div>
