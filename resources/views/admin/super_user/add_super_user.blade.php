@extends('admin.admin_layout.layout')



@section('admin_content')



    @include('admin.admin_layout.header')
    @include('admin.admin_layout.dashboard_options')


    <!-- ============ Body content start ============= -->
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.admin_layout.head_name')

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Add Super User</div>
                            <form  method="post" action="/admin/dashboard/super/add_new" enctype="multipart/form-data">
                                @csrf
                                @if(session()->has("MSG"))@include('admin.admin_layout.msg')@endif
                                @if($errors->any()) @include('admin.admin_layout.form_error') @endif
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1" class="text-danger">First name *</label>
                                        <input type="text" class="form-control" id="firstName1" value="{{old('firstname')}}" name="firstname" placeholder="Enter your first name" required>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="lastName1">Last name</label>
                                        <input type="text" class="form-control" id="lastName1" value="{{old('lastname')}}" name="lastname" placeholder="Enter your last name">
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="exampleInputEmail1" class="text-danger">Email address *</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}"  placeholder="Enter email" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="phone" class="text-danger">Phone *</label>
                                        <input class="form-control" id="phone" name="phone" value="{{old('phone')}}"  placeholder="Enter phone" required>
                                    </div>


                                    <div class="col-md-6 form-group mb-3">
                                        <label for="picker3">Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo" value="{{old('photo')}}" id="inputGroupFile02" onchange="ChangeText(this, 'txt');">
                                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02" id="txt">Choose
                                                file</label>
                                        </div>
                                    </div>
                                    <script>
                                        function ChangeText(oFileInput, sTargetID) {

                                            document.getElementById(sTargetID).innerHTML = oFileInput.value;

                                        }</script>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="picker1" class="text-danger">Privileges *</label>
                                        <select class="form-control" name="permissions" >
                                            <option >All </option>
                                            <option  value="Report">Report Only</option>
                                            <option  value="Data">Data Insertion</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>











            </div>


        </div>

       @include('admin.admin_layout.footer')
    </div>
    <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
    <!-- ============ Search UI Start ============= -->









    @endsection