<div class="col-6">
    <h2>CHANGE PASSWORD</h2>
    <form action="{{ route('change-password.update',$u->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-sm-12 d-flex mb-3 justify-content-center flex-wrap">
            <div class="col-sm-12 mt-3">
                <p class="text-black font-weight-bold">Current Password</p>
                <input type="password" class="form-control adminForm" name="current_password" id="tbPasswordOldUpdate">
            </div>
            <div class="col-sm-12 mt-3">
                <p class="text-black font-weight-bold">New Password</p>
                <input type="password" class="form-control adminForm" name="password" id="tbPasswordNewUpdate">
            </div>
            <div class="col-sm-12 mt-3">
                <p class="text-black font-weight-bold">Repeat password</p>
                <input type="password" class="form-control adminForm" name="password_confirmation" id="tbRepeatPasswordNewUpdate">
            </div>
        </div>
        <div class="col-sm-12 mb-2 mt-2 d-flex justify-content-center">
            <input type="submit" class="btn btn-warning" name="btnUpdateUser" id="btnUpdateUser" value="Update password" />
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
    @if (session()->has('errorChangePassword'))
        <div class="alert alert-warning">
            <h3>{{ session('errorChangePassword') }}</h3>
        </div>
    @endif
    @if (session()->has('warningChangePassword'))
        <div class="alert alert-warning">
            <h3>{{ session('warningChangePassword') }}</h3>
        </div>
    @endif
    @if (session()->has('successChangePassword'))
        <div class="alert alert-success">
            <h3>{{ session('successChangePassword') }}</h3>
        </div>
    @endif
</div>
