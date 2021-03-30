
<div class="col-6">
    <h2>CHANGE PROFILE</h2>
    <form action="{{ route('profile.update',$u->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-sm-12 d-flex flex-wrap">
            <div class="col-sm-12 mt-3">
                <p class="text-black font-weight-bold">First name</p>
                <input type="text" class="form-control adminForm" name="firstname" id="tbFirstNameUpdate" value="{{ $u->firstname }}" >
            </div>
            <div class="col-sm-12 mt-3">
                <p class="text-black font-weight-bold">Last name</p>
                <input type="text" class="form-control adminForm" name="lastname" id="tbLastNameUpdate" value="{{ $u->lastname }}">
            </div>
        </div>
        <div class="col-sm-12 d-flex mb-3 justify-content-center flex-wrap">
            <div class="col-sm-12 mt-3">
                <p class="text-black font-weight-bold">Email</p>
                <input type="email"  class="form-control adminForm" name="email" id="tbEmailUpdate" value="{{ $u->email }}">
            </div>
        </div>
        <div class="col-sm-12 mb-2 mt-2 d-flex justify-content-center">
            <input type="submit" class="btn btn-warning" name="btnUpdateUser" id="btnUpdateUser" value="Update Profile" />
            <input type="button" class="btn btn-dark ml-3" name="btnCancelUpdateUser" id="btnCancelUpdateUser" value="Cancel Changes" />
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
    @if (session()->has('warningUpdateUser'))
        <div class="alert alert-warning">
            <h3>{{ session('warningUpdateUser') }}</h3>
        </div>
    @endif
    @if (session()->has('successUpdateUser'))
        <div class="alert alert-success">
            <h3>{{ session('successUpdateUser') }}</h3>
        </div>
    @endif
</div>
