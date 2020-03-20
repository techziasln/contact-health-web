
@extends('admin.admin_layout.layout')



@section('admin_content')



    @include('admin.admin_layout.header')
    @include('admin.admin_layout.dashboard_options')
    <!-- ============ Body content start ============= -->
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.admin_layout.head_name')
            <div class="separator-breadcrumb border-top"></div>


            <!-- end of row -->

            <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">

                        <div class="card-body">
                            <h4 class="card-title mb-3">All Contacts</h4>

                            <div class="table-responsive">
                                <table id="zero_configuration_table" class="display table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>ODK ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>OTP</th>
                                        <th>Current Location</th>
                                        <th>Info</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $values)
                                    <tr>
                                        <td>{{$values->odk_id}}</td>
                                        <td>{{$values->name}}</td>
                                        <td>{{$values->phone}}</td>
                                        <td>{{$values->otp}}</td>
                                        <td>{{$values->lat}} {{$values->lng}}</td>
                                        <td>{{$values->addinfo}}</td>
                                        <td>
                                            {{--<a href="{{route('',$values->id)}}" data-toggle="tooltip" title="view" class="text-primary mr-2">--}}
                                                {{--<i class="nav-icon i-Eye-Visible font-weight-bold"></i>--}}
                                            {{--</a>--}}
                                            <a href="{{route('update_patient',$values->id)}}" data-toggle="tooltip" title="edit" class="text-success mr-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>

                                            <a  class="text-danger mr-2" data-toggle="tooltip" title="delete"  onclick="if(confirm('Are you sure you want to delete this item?')){ event.preventDefault();document.getElementById('delete-form-{{$values->id}}').submit(); }">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                            <a href="{{route('map',$values->odk_id)}}" data-toggle="tooltip" title="location" class="text-warning mr-2">
                                                <i class="nav-icon i-Map-Marker font-weight-bold"></i>
                                            </a>
                                            <form method="post" action="{{route('delete_patient')}}" id="delete-form-{{$values->id}}" style="display: none">
                                                @csrf
                                               @method('DELETE')

                                                <input type="hidden" value="{{$values->id}}" name="id">

                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach


                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end of col -->




















            </div>
            <!-- end of row -->



        </div>

      @include('admin.admin_layout.footer')
    </div>
    <!-- ============ Body content End ============= -->
</div>
<!--=============== End app-admin-wrap ================-->

<!-- ============ Search UI Start ============= -->
<!-- ============ Search UI Start ============= -->


@endsection

