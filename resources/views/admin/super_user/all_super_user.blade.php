@extends('admin.admin_layout.layout')



@section('admin_content')



    @include('admin.admin_layout.header')
    @include('admin.admin_layout.dashboard_options')


    <!-- ============ Body content start ============= -->
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.admin_layout.head_name')

            <div class="separator-breadcrumb border-top"></div>

            <div class="row mb-4">

                <div class="col-md-12">
                    <div class="card ">

                        <div class="card-body">
                            <h4 class="card-title mb-3">All Super Users</h4>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Permission</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1 @endphp
                                    @foreach($users as $data)

                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td> {{ $a=$data->id != auth()->id() ? $data->name : 'YOU' }} </td>

                                        <td>
                                        @if($data->photo =='')
                                            <img class="rounded-circle m-0 avatar-sm-table" src="{{elixir('assets/images/avathar.jpg')}}" alt="">
                                        @endif
                                       @if($data->photo) {{--    {{elixir('/public/storage/superuser/'.$data->photo)}}--}}
                                                <img class="rounded-circle m-0 avatar-sm-table"
                                                     src="/{{str_replace('public','storage',$data->photo)}}" alt="">
                                               @endif

                                        </td>

                                        <td>{{$data->email}}</td>
                                        <td><span class="badge badge-success">{{strtoupper($data->permissions)}}</span></td>
                                        <td>
                                            <a href="{{route('update_superuser',['id'=>$data->id])}}" data-toggle="tooltip" title="edit" class="text-success mr-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>  @if($data->id != auth()->id())
                                            <a data-toggle="tooltip" title="delete" class="text-danger mr-2"  onclick="if(confirm('Are you sure you want to delete this item?')){ event.preventDefault();document.getElementById('delete-form-{{$data->id}}').submit(); }">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <form method="post" action="{{route('delete_superuser')}}" id="delete-form-{{$data->id}}" style="display: none">
                                        @csrf
                                        @method('DELETE')

                                        <input type="hidden" value="{{$data->id}}" name="id">

                                    </form>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end of col-->


                <!-- end of col-->

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