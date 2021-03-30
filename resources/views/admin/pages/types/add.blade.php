<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form action="#" method="POST" class="contact-form add-type">
                <div class="row d-flex justify-content-center align-content-between">
                    <div class="col-sm-10   mb-3 d-flex justify-content-center">
                        <h2 class="mb-0">ADD ROOM TYPE</h2>
                    </div>
                    <div class="col-sm-8 mt-3">
                        <p class="text-black font-weight-bold">Type of room</p>
                        <input type="text" class="form-control adminForm" name="typeName" data-field="type name"  id="tbNameTypeAdd">
                        <p class="text-danger msgErrorNameType"></p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-black font-weight-bold">max capacity of people</p>
                        <input type="number" class="form-control adminForm" data-field="capacity" name="capacity"  id="tbAddCapacity">
                        <p class="text-danger msgErrorCapacity"></p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-black font-weight-bold">Quantity</p>
                        <input type="number" min="0" max="50" class="form-control adminForm" data-field="quantity"  name="quantity"  id="tbAddQuantity" >
                        <p class="text-danger msgErrorQuantity"></p>
                    </div>
                    <div class="col-sm-8 mb-2 mt-2 d-flex justify-content-center">
                        <input type="submit" class="btn btn-info" name="btnAddRoomType" id="btnAddRoomType" value="Insert" />
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


        </div>

        <div class="errors col-lg-6 d-flex align-items-center">

        </div>
    </div>
</div>
