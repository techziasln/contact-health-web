
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
                            <h4 class="card-title mb-3">All Status</h4>

                            <div class="table-responsive">
                                <table id="zero_configuration_table" class="display table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>ODK ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Latest Update</th>
                                        <th>Risk Level (as per latest info.)</th>
                                        <th> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $values)
                                        <tr>
                                            <td>{{$values->odk_id}}</td>
                                            <td>{{$values->name}}</td>
                                            <td>{{$values->phone}}</td>
                                            @if($values->last_date)
                                            <td>{{ date('d-m-Y', strtotime($values->last_date))}}&nbsp; &nbsp; {{date('h:i:s A', strtotime($values->last_date))}}</td>
                                            @else
                                                <td>Nil</td>
                                            @endif
                                            <td>@if($values->risk_level == '3')<span class="blinking badge badge-danger px-2">High</span>
                                                @elseif($values->risk_level == '2')<span class="badge badge badge-warning px-2">Medium</span>
                                                @elseif($values->risk_level == '1')<span class="badge badge badge-light px-2">Low</span>
                                                @elseif($values->risk_level == '0')<span class="badge badge badge-success px-2">Ok</span>
                                                @else<span class="text-center text-warning">Status not Entered</span>
                                                @endif
                                                {{--@if()--}}
                                            </td>
                                            <td>
                                                <a href="{{route('view_status',$values->odk_id)}}" data-toggle="tooltip" title="view" class="text-primary mr-2">
                                                <i class="nav-icon i-Eye-Visible font-weight-bold"></i>
                                                </a>
                                                <a href="{{route('map',$values->odk_id)}}" data-toggle="tooltip" title="location" class="text-warning mr-2">
                                                    <i class="nav-icon i-Map-Marker font-weight-bold"></i>
                                                </a>

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

