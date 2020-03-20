


    <div class="side-content-wrap">
        <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
            <ul class="navigation-left">

                <li class="nav-item {{\Illuminate\Support\Facades\Request::path()=="admin/dashboard"?'active':''}}" >
                    <a class="nav-item-hold" href="/">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{\Illuminate\Support\Facades\Request::path()=="admin/dashboard/super/add_new"?'active':''}}
                                    {{\Illuminate\Support\Facades\Request::path()=="admin/dashboard/super/all_super"?'active':''}}

                        " data-item="super_user">
                    <a class="nav-item-hold" href="">
                        <i class="nav-icon i-Add-UserStar"></i>
                        <span class="nav-text">Super User</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{\Illuminate\Support\Facades\Request::path()=="admin/dashboard/contact/new"?'active':''}}
                {{\Illuminate\Support\Facades\Request::path()=="admin/dashboard/contact/all"?'active':''}}" data-item="patient">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Engineering"></i>
                        <span class="nav-text">Contact</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item" >
                    <a class="nav-item-hold" href="{{route('all_status')}}">
                        <i class="nav-icon i-File-Graph"></i>
                        <span class="nav-text">Status</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item" >
                    <a class="nav-item-hold" href="{{route('graph')}}">
                        <i class="nav-icon i-File-Chart"></i>
                        <span class="nav-text">Reports</span>
                    </a>
                    <div class="triangle"></div>
                </li>


                {{--<li class="nav-item" >--}}
                    {{--<a class="nav-item-hold" href="{{route('map')}}">--}}
                        {{--<i class="nav-icon i-Map2"></i>--}}
                        {{--<span class="nav-text">Map</span>--}}
                    {{--</a>--}}
                    {{--<div class="triangle"></div>--}}
                {{--</li>--}}
            </ul>
        </div>

        <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
            <!-- Submenu Dashboards -->
            <ul class="childNav" data-parent="super_user">
                <li class="nav-item ">
                    <a class=""
                       href={{url("/admin/dashboard/super/add_new/")}}>
                        <i class="nav-icon i-Add-User"></i>
                        <span class="item-name">Add New User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{url("/admin/dashboard/super/all_super/")}}
                       class="">
                        <i class="nav-icon i-Business-Mens"></i>
                        <span class="item-name">All  Users</span>
                    </a>
                </li>

            </ul>
            <ul class="childNav" data-parent="patient">
                <li class="nav-item ">
                    <a class=""
                       href={{url("/admin/dashboard/contact/add/")}}>
                        <i class="nav-icon i-Add"></i>
                        <span class="item-name">Add New Contact</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{url("/admin/dashboard/contact/all/")}}
                       class="">
                        <i class="nav-icon i-MaleFemale"></i>
                        <span class="item-name">All Contacts</span>
                    </a>
                </li>

            </ul>

        </div>
        <div class="sidebar-overlay"></div>
    </div>
    <!--=============== Left side End ================-->
