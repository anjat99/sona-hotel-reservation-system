<div class="container-fluid">
    <div class="row d-flex justify-content-center align-content-between ">
        <div class="col-lg-8">
            <form action="{{ route('hotel-services.store') }}" method="POST" class="contact-form add-hotel-service" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-center align-content-between">
                    <div class="col-sm-10   mb-3 d-flex justify-content-center">
                        <h2 class="mb-0">ADD HOTEL-SERVICE</h2>
                    </div>
                    <div class="col-sm-12 d-flex mb-3">
                        <div class="col-sm-6 mt-3">
                            <p class="text-black font-weight-bold">Title</p>
                            <input type="text" class="form-control adminForm" name="title" id="tbTitle" >
                        </div>
                        <div class="col-sm-6 mt-3">
                            <p class="text-black font-weight-bold">IMAGE</p>
                            <input type="file"  class="form-control adminForm" name="image"  id="image">
                        </div>
                    </div>
                    <div class="form-group purple-border col-sm-11 mt-2">
                        <p class="text-black font-weight-bold">Description</p>
                        <textarea class="form-control adminForm" name="description"  id="taDescriptionAdd"></textarea>
                    </div>

                    <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">
                        <input type="submit" class="btn btn-info" name="btnAddHS" id="btnAddHS" value="Insert room service" />
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
            @if (session()->has('errorAddHService'))
                <div class="alert alert-warning">
                    <h3>{{ session('errorAddHService') }}</h3>
                </div>
            @endif

            @if (session()->has('successAddHService'))
                <div class="alert alert-success">
                    <h3>{{ session('successAddHService') }}</h3>
                </div>
            @endif
        </div>
    </div>
</div>
