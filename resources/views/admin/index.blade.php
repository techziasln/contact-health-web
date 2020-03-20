@extends('admin.admin_layout.layout')



@section('admin_content')



    @include('admin.admin_layout.header')
    @include('admin.admin_layout.dashboard_options')


    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">

           @if(session()->has('page_msg')) @include('admin.admin_layout.page_msg') @endif


            @include('admin.admin_layout.head_name')

            <div class="separator-breadcrumb border-top"></div>

            <div class="card user-profile o-hidden mb-4">
                <div class="header-cover" style="background-image:url({{elixir('medipro/1.jpg')}});background-position: center"></div>
                <div class="user-info">
                    <img class="profile-picture avatar-lg mb-2" src="{{elixir('medipro/logo3.png')}}" alt="">
                    <p class="m-0 text-24">ContactHealth</p>
            </div>
            </div>
        </div>
        </div>
        @include('admin.admin_layout.footer')


    @endsection