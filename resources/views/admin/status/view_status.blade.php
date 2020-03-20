
@extends('admin.admin_layout.layout')



@section('admin_content')



    @include('admin.admin_layout.header')
    @include('admin.admin_layout.dashboard_options')
    <!-- ============ Body content start ============= -->
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.admin_layout.head_name')
            <div class="separator-breadcrumb border-top"></div>
            <div class="card user-profile o-hidden mb-4">
                    <span class="m-0 text-24 align-self-center py-2">ODK ID: {{ucfirst($p->odk_id)}}&nbsp;&nbsp;
                    Name: {{ucfirst($p->name)}}&nbsp;&nbsp;
                    Phone: {{ucfirst($p->phone)}}</span>
            </div>

            <!-- end of row -->

            <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="zero_configuration_table" class="display table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Date & Time</th>
                                        <th>പനി</th>
                                        <th>ചുമ</th>
                                        <th>ശ്വാസ തടസം</th>
                                        <th>തൊണ്ടവേദന</th>
                                        <th>ജലദോഷം</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    @foreach($i as $values)
                                    <tbody>

                                    <tr>
                                        <td>{{date('d-m-Y', strtotime($values->created_at))}}&nbsp; &nbsp; {{date('h:i:s A', strtotime($values->created_at))}}</td>
{{--                                        <td>{{$values->created_at}}</td>--}}
                                        <td>@if($values->fever) Yes @else No @endif</td>
                                        <td>@if($values->cough) Yes @else No @endif</td>
                                        <td>@if($values->suffocation) Yes @else No @endif</td>
                                        <td>@if($values->throat) Yes @else No @endif</td>
                                        <td>@if($values->cold) Yes @else No @endif</td>
                                        <td>@if($values->risk_level == '3')<span class="blinking badge badge-danger" >High</span>
                                            @elseif($values->risk_level == '2')<span class="badge badge badge-warning">Medium</span>
                                            @elseif($values->risk_level == '1')<span class="badge badge badge-light">Low</span>
                                            @else<span class=" badge badge-success">Ok</span>
                                            @endif</td>
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

