

<div class="app-admin-wrap layout-sidebar-large clearfix">
    <div class="main-header">
        <div class="auth-logo">
{{--            @include('admin.admin_layout.mob_logo')--}}
{{--            @include('admin.admin_layout.logo')--}}
            <h4><strong>ContactHealth</strong></h4>
        </div>

{{--        <div class="navbar-brand hidden-sm-down"> @include('admin.admin_layout.logo')</div>--}}
{{--        <div class="navbar-brand hidden-md-up"> @include('admin.admin_layout.mob_logo') </div>--}}


        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>



        <div style="margin: auto"></div>

        <div class="header-part-right">
            <!-- Full screen toggle -->
            <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
            <!-- Grid menu Dropdown -->
{{--            <div class="dropdown widget_dropdown">--}}
{{--                <i class="i-Safe-Box text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>--}}
{{--                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                    <div class="menu-icon-grid">--}}
{{--                        <a href="#"><i class="i-Shop-4"></i> Home</a>--}}
{{--                        <a href="#"><i class="i-Library"></i> UI Kits</a>--}}
{{--                        <a href="#"><i class="i-Drop"></i> Apps</a>--}}
{{--                        <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>--}}
{{--                        <a href="#"><i class="i-Checked-User"></i> Sessions</a>--}}
{{--                        <a href="#"><i class="i-Ambulance"></i> Support</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- Notificaiton -->
{{--            <div class="dropdown">--}}
{{--                <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    <span class="badge badge-primary">3</span>--}}
{{--                    <i class="i-Bell text-muted header-icon"></i>--}}
{{--                </div>--}}
{{--                <!-- Notification dropdown -->--}}
{{--                <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">--}}
{{--                    <div class="dropdown-item d-flex">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <i class="i-Speach-Bubble-6 text-primary mr-1"></i>--}}
{{--                        </div>--}}
{{--                        <div class="notification-details flex-grow-1">--}}
{{--                            <p class="m-0 d-flex align-items-center">--}}
{{--                                <span>New message</span>--}}
{{--                                <span class="badge badge-pill badge-primary ml-1 mr-1">new</span>--}}
{{--                                <span class="flex-grow-1"></span>--}}
{{--                                <span class="text-small text-muted ml-auto">10 sec ago</span>--}}
{{--                            </p>--}}
{{--                            <p class="text-small text-muted m-0">James: Hey! are you busy?</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item d-flex">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <i class="i-Receipt-3 text-success mr-1"></i>--}}
{{--                        </div>--}}
{{--                        <div class="notification-details flex-grow-1">--}}
{{--                            <p class="m-0 d-flex align-items-center">--}}
{{--                                <span>New order received</span>--}}
{{--                                <span class="badge badge-pill badge-success ml-1 mr-1">new</span>--}}
{{--                                <span class="flex-grow-1"></span>--}}
{{--                                <span class="text-small text-muted ml-auto">2 hours ago</span>--}}
{{--                            </p>--}}
{{--                            <p class="text-small text-muted m-0">1 Headphone, 3 iPhone x</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item d-flex">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <i class="i-Empty-Box text-danger mr-1"></i>--}}
{{--                        </div>--}}
{{--                        <div class="notification-details flex-grow-1">--}}
{{--                            <p class="m-0 d-flex align-items-center">--}}
{{--                                <span>Product out of stock</span>--}}
{{--                                <span class="badge badge-pill badge-danger ml-1 mr-1">3</span>--}}
{{--                                <span class="flex-grow-1"></span>--}}
{{--                                <span class="text-small text-muted ml-auto">10 hours ago</span>--}}
{{--                            </p>--}}
{{--                            <p class="text-small text-muted m-0">Headphone E67, R98, XL90, Q77</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item d-flex">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <i class="i-Data-Power text-success mr-1"></i>--}}
{{--                        </div>--}}
{{--                        <div class="notification-details flex-grow-1">--}}
{{--                            <p class="m-0 d-flex align-items-center">--}}
{{--                                <span>Server Up!</span>--}}
{{--                                <span class="badge badge-pill badge-success ml-1 mr-1">3</span>--}}
{{--                                <span class="flex-grow-1"></span>--}}
{{--                                <span class="text-small text-muted ml-auto">14 hours ago</span>--}}
{{--                            </p>--}}
{{--                            <p class="text-small text-muted m-0">Server rebooted successfully</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- Notificaiton End -->

            <!-- User avatar dropdown -->
            <div class="dropdown">

                <div  class="user col align-self-end">
                    @if(\Illuminate\Support\Facades\Auth::user()->photo)
                    <img src="{{url(str_replace('public','storage',\Illuminate\Support\Facades\Auth::user()->photo))}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @else
                        <img src="{{elixir('assets/images/avathar.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    @endif



                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i> {{ucfirst(\Illuminate\Support\Facades\Auth::user()->name)}}
                        </div>
                        <a class="dropdown-item">Help</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- header top menu end -->