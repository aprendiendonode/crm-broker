<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <title> OTG | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    @include('feed::links')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('logo.png')}}">
@yield('css')

<!-- Plugins css -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>

<!-- App css -->
        @if(auth()->user()->default_mode == 'light')
            <link href="{{asset('assets/css/bootstrap-modern.min.css')}}" rel="stylesheet" type="text/css"
                id="bs-default-stylesheet"/>
            <link href="{{asset('assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css"
                id="app-default-stylesheet"/>
        @endif        

          @if(auth()->user()->default_mode == 'dark')
            <link href="{{asset('assets/css/bootstrap-modern-dark.min.css')}}" rel="stylesheet" type="text/css"
                id="bs-dark-stylesheet" />
            <link href="{{asset('assets/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css"
                id="app-dark-stylesheet" />
           @endif
    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
   
    <style>

body[data-sidebar-size=condensed]:not([data-layout=compact]){
    min-height: 100vh;
}
        .error {
            color: red;
            font-size: 14px;
            font-weight: 400;
        }

        .feather-16 {
            font-size: 16px !important;

        }

        .feather-20 {
            font-size: 20px !important;

        }

        .feather-24 {
            font-size: 24px !important;
        }

        .feather-32 {
            font-size: 32px !important;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
</head>

<body data-layout-mode="detached"
      data-layout='{"mode": "{{ auth()->user()->default_mode }}",
       "width": "{{ auth()->user()->default_width }}", "menuPosition": "{{ auth()->user()->default_position }}",
        "sidebar": { "color": "{{ auth()->user()->default_sidebar_color }}", "size": "{{ auth()->user()->default_sidebar_size }}", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'
      >

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box dropdown">
                            {{--          <div class="input-group">
                                         <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                         <div class="input-group-append">
                                             <button class="btn" type="submit">
                                                 <i class="fe-search"></i>
                                             </button>
                                         </div>
                                     </div> --}}
                            <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found 22 results</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-home mr-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-aperture mr-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings mr-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="media">
                                            <img class="d-flex mr-2 rounded-circle"
                                                 src="{{asset('assets/images/users/user-2.jpg')}}"
                                                 alt="Generic placeholder image" height="32">
                                            <div class="media-body">
                                                <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="media">
                                            <img class="d-flex mr-2 rounded-circle"
                                                 src="{{asset('assets/images/users/user-5.jpg')}}"
                                                 alt="Generic placeholder image" height="32">
                                            <div class="media-body">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </form>
                </li>

                <li class="dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown"
                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-search noti-icon"></i>
                    </a>
                    {{--           <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                                  <form class="p-3">
                                      <input type="text" class="form-control" placeholder="Search ..."
                                             aria-label="Recipient's username">
                                  </form>
                              </div> --}}
                </li>

                <li class="dropdown d-none d-lg-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                       href="#">
                        <i class="fe-maximize noti-icon"></i>
                    </a>
                </li>

                @php
                    //$agencies = App\Models\Agency::where('business_id',auth()->user()->business_id)->get();

                    $agencies = cache()->remember('cache_agencies_'.auth()->user()->business_id, 60 * 60 * 24, function ()  {
                                    return App\Models\Agency::where('business_id',auth()->user()->business_id)->get();
                                });
                @endphp
                {{--@if(owner() || moderator())--}}
                {{--<li class="dropdown d-none d-lg-inline-block topbar-dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown"--}}
                       {{--href="#" role="button" aria-haspopup="false" aria-expanded="false">--}}
                        {{--<i class="fe-grid noti-icon"></i>--}}
                    {{--</a>--}}
                        {{--<div class="dropdown-menu dropdown-lg dropdown-menu-right">--}}

                            {{--<div class="p-lg-1">--}}
                                    {{--<div class="row no-gutters">--}}
                                        {{--@forelse($agencies as $agency)--}}
                                        {{--<div class="col-4">--}}
                                            {{--<form action="{{route('change_agency')}}" id="change_agency_{{$agency->id}}">--}}
                                                {{--<input type="hidden" name="current" value="{{ url()->current() }}">--}}
                                                {{--<input type="hidden" name="agency_id" value="{{$agency->id }}">--}}

                                                {{--<a class="dropdown-icon-item " onclick="event.preventDefault();document.getElementById('change_agency_{{$agency->id}}').submit();">--}}
                                                    {{--<img src="{{$agency->image != null ? asset('company_profile_images/'.$agency->image) : asset('assets/images/default-agency.jpg')}}" alt="{{ $agency->{'company_name_en_'.app()->getLocale()} ?? '' }}">--}}
                                                    {{--<span>{{ $agency->{'company_name_'.app()->getLocale()} ?? '' }}</span>--}}
                                                {{--</a>--}}
                                            {{--</form>--}}
                                        {{--</div>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    {{--</div>--}}

                            {{--</div>--}}

                        {{--</div>--}}
                {{--</li>--}}
                {{--@endif--}}

                <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                    @if(auth()->user()->language == 'en' || auth()->user()->language == null)

                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown"
                           href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('assets/images/flags/us.jpg')}}" alt="user-image" height="16">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="{{route('change_language','ar')}}" class="dropdown-item">
                                <img src="{{asset('images/flags/egypt.png')}}" alt="user-image" class="mr-1"
                                     height="12"> <span class="align-middle">@lang('settings.arabic')</span>
                            </a>

                        </div>

                    @elseif(auth()->user()->language == 'ar')
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown"
                           href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('images/flags/egypt.png')}}" alt="user-image" height="16">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="{{route('change_language','en')}}" class="dropdown-item">
                                <img src="{{asset('assets/images/flags/us.jpg')}}" alt="user-image" class="mr-1"
                                     height="12"> <span class="align-middle">@lang('settings.english')</span>
                            </a>
                        </div>
                    @endif
                </li>

                @include('layouts.notify')


                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ auth()->user()->image != null ? asset('profile_images/'.auth()->user()->image) : ''  }}"
                             alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                                    {{ auth()->user() ? auth()->user()->name_en : '' }} <i
                                    class="mdi mdi-chevron-down"></i>
                                </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        @if(!owner())
                            <a href="{{ route('setting.profiles.edit',[auth()->user()->id,auth()->user()->agency_id]) }}"
                               class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>
                        @else
                            <a href="{{ route('setting.profiles.edit',[auth()->user()->id,auth()->user()->agencies->first()->id]) }}"
                               class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>
                        @endif
                    <!-- item-->


                        {{-- <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a> --}}

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="javascript:void(0);"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                           class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>


                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <form method="post" action="{{ url('logout') }}" id="logout-form" style="display:none">
                @csrf
            </form>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ url('/') }}" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset('logo.png')}}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                    <span class="logo-lg">
                                <img src="{{asset('logo.png')}}" alt="" height="20">
                        <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                </a>

                <a href="{{ url('/') }}" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{asset('logo.png')}}" alt="" height="50">
                            </span>
                    <span class="logo-lg">
                                <img src="{{asset('logo.png')}}" alt="" height="50">
                            </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <!-- Mobile menu toggle (Horizontal Layout)-->
                    <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                {{--<li class="dropdown d-none d-xl-block">--}}
                {{--<a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"--}}
                {{--role="button" aria-haspopup="false" aria-expanded="false">--}}
                {{--Create New--}}
                {{--<i class="mdi mdi-chevron-down"></i>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu">--}}
                {{--<!-- item-->--}}
                {{--<a href="javascript:void(0);" class="dropdown-item">--}}
                {{--<i class="fe-briefcase mr-1"></i>--}}
                {{--<span>New Projects</span>--}}
                {{--</a>--}}

                {{--<!-- item-->--}}
                {{--<a href="javascript:void(0);" class="dropdown-item">--}}
                {{--<i class="fe-user mr-1"></i>--}}
                {{--<span>Create Users</span>--}}
                {{--</a>--}}

                {{--<!-- item-->--}}
                {{--<a href="javascript:void(0);" class="dropdown-item">--}}
                {{--<i class="fe-bar-chart-line- mr-1"></i>--}}
                {{--<span>Revenue Report</span>--}}
                {{--</a>--}}

                {{--<!-- item-->--}}
                {{--<a href="javascript:void(0);" class="dropdown-item">--}}
                {{--<i class="fe-settings mr-1"></i>--}}
                {{--<span>Settings</span>--}}
                {{--</a>--}}

                {{--<div class="dropdown-divider"></div>--}}

                {{--<!-- item-->--}}
                {{--<a href="javascript:void(0);" class="dropdown-item">--}}
                {{--<i class="fe-headphones mr-1"></i>--}}
                {{--<span>Help & Support</span>--}}
                {{--</a>--}}

                {{--</div>--}}
                {{--</li>--}}

                {{--<li class="dropdown dropdown-mega d-none d-xl-block">--}}
                {{--<a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"--}}
                {{--role="button" aria-haspopup="false" aria-expanded="false">--}}
                {{--Mega Menu--}}
                {{--<i class="mdi mdi-chevron-down"></i>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropdown-megamenu">--}}
                {{--<div class="row">--}}
                {{--<div class="col-sm-8">--}}

                {{--<div class="row">--}}
                {{--<div class="col-md-4">--}}
                {{--<h5 class="text-dark mt-0 font-weight-normal">UI Components</h5>--}}
                {{--<ul class="list-unstyled megamenu-list">--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Widgets</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Nestable List</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Range Sliders</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Masonry Items</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Sweet Alerts</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Treeview Page</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Tour Page</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}

                {{--<div class="col-md-4">--}}
                {{--<h5 class="text-dark mt-0 font-weight-normal">Applications</h5>--}}
                {{--<ul class="list-unstyled megamenu-list">--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">eCommerce Pages</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">CRM Pages</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Email</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Calendar</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Team Contacts</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Task Board</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Email Templates</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}

                {{--<div class="col-md-4">--}}
                {{--<h5 class="text-dark mt-0 font-weight-normal">Extra Pages</h5>--}}
                {{--<ul class="list-unstyled megamenu-list">--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Left Sidebar with User</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Menu Collapsed</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Small Left Sidebar</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">New Header Style</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Search Result</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Gallery Pages</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0);">Maintenance & Coming Soon</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4">--}}
                {{--<div class="text-center mt-3">--}}
                {{--<h3 class="text-dark">Special Discount Sale!</h3>--}}
                {{--<h4>Save up to 70% off.</h4>--}}
                {{--<button class="btn btn-primary btn-rounded mt-3">Download Now</button>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--</li>--}}
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center">
                <img src="{{auth()->user()->image != null ? asset('profile_images/'.auth()->user()->image) : ''}}"
                     alt="user-img" title="Mat Helme"
                     class="rounded-circle avatar-md">
                <div class="dropdown">
                    <a href="javascript: void(0);"
                       class="text-dark font-weight-normal dropdown-toggle h5 mt-2 mb-1 d-block"
                       data-toggle="dropdown">{{ auth()->user()->{'name_'.app()->getLocale()} }}</a>
                    <div class="dropdown-menu user-pro-dropdown">

                        <!-- item-->
                        @if(!owner())
                            <a href="{{ route('setting.profiles.edit',[auth()->user()->id,auth()->user()->agency_id]) }}"
                               class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>
                        @else
                            <a href="{{ route('setting.profiles.edit',[auth()->user()->id,auth()->user()->agencies->first()->id]) }}"
                               class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>
                    @endif

                    {{-- <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a> --}}

                    <!-- item-->
                        <a href="javascript:void(0);"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                           class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>


                    </div>
                </div>
                {{-- <p class="text-muted">Admin Head</p> --}}
            </div>


        @include('layouts.menu')
        <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->


    <div class="content-page" style="display: flex;
flex-direction: column;
justify-content: space-between; min-height: 92vh;">

    @yield('content')

    <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2021 -
                        <script>document.write(new Date().getFullYear())</script> &copy; OTG<a href=""></a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link py-2" data-toggle="tab" href="#chat-tab" role="tab">
                    <i class="mdi mdi-message-text d-block font-22 my-1"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-2" data-toggle="tab" href="#tasks-tab" role="tab">
                    <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
                    <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content pt-0">
            <div class="tab-pane" id="chat-tab" role="tabpanel">

                {{--      <form class="search-bar p-3">
                         <div class="position-relative">
                             <input type="text" class="form-control" placeholder="Search...">
                             <span class="mdi mdi-magnify"></span>
                         </div>
                     </form>
      --}}
                <h6 class="font-weight-medium px-3 mt-2 text-uppercase">Group Chats</h6>

                <div class="p-2">
                    <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-success"></i>
                        <span class="mb-0 mt-1">App Development</span>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-warning"></i>
                        <span class="mb-0 mt-1">Office Work</span>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-danger"></i>
                        <span class="mb-0 mt-1">Personal Group</span>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item pl-3 d-block">
                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                        <span class="mb-0 mt-1">Freelance</span>
                    </a>
                </div>

                <h6 class="font-weight-medium px-3 mt-3 text-uppercase">Favourites <a href="javascript: void(0);"
                                                                                      class="font-18 text-danger"><i
                                class="float-right mdi mdi-plus-circle"></i></a></h6>

                <div class="p-2">
                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-10.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status online"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Andrew Mackie</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-1.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status away"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Rory Dalyell</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">To an English person, it will seem like simplified</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-9.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status busy"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Jaxon Dunhill</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <h6 class="font-weight-medium px-3 mt-3 text-uppercase">Other Chats <a href="javascript: void(0);"
                                                                                       class="font-18 text-danger"><i
                                class="float-right mdi mdi-plus-circle"></i></a></h6>

                <div class="p-2 pb-4">
                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-2.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status online"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Jackson Therry</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-4.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status away"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Charles Deakin</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-5.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status online"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Ryan Salting</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">If several languages coalesce the grammar of the
                                        resulting.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-6.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status online"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Sean Howse</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-7.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status busy"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Dean Coward</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="media">
                            <div class="position-relative mr-2">
                                <img src="{{asset('assets/images/users/user-8.jpg')}}" class="rounded-circle avatar-sm"
                                     alt="user-pic">
                                <i class="mdi mdi-circle user-status away"></i>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">Hayley East</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">One could refuse to pay expensive translators.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="text-center mt-3">
                        <a href="javascript:void(0);" class="btn btn-sm btn-white">
                            <i class="mdi mdi-spin mdi-loading mr-2"></i>
                            Load more
                        </a>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="tasks-tab" role="tabpanel">
                <h6 class="font-weight-medium p-3 m-0 text-uppercase">Working Tasks</h6>
                <div class="px-2">
                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">App Development<span class="float-right">75%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">Database Repair<span class="float-right">37%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">Backup Create<span class="float-right">52%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 52%"
                                 aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>
                </div>

                <h6 class="font-weight-medium px-3 mb-0 mt-4 text-uppercase">Upcoming Tasks</h6>

                <div class="p-2">
                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">Sales Reporting<span class="float-right">12%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">Redesign Website<span class="float-right">67%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 67%"
                                 aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">New Admin Design<span class="float-right">84%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 84%"
                                 aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>
                </div>

                <div class="p-3 mt-2">
                    <a href="javascript: void(0);" class="btn btn-success btn-block waves-effect waves-light">Create
                        Task</a>
                </div>

            </div>
            <div class="tab-pane active" id="settings-tab" role="tabpanel">
                <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                    <span class="d-block py-1">Theme Settings</span>
                </h6>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
               

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark"
                               id="dark-mode-check" @if(auth()->user()->default_mode == 'dark') checked @endif/>
                        <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                    </div>
                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                     
                               id="light-mode-check" @if(auth()->user()->default_mode == 'light') checked @endif />
                             
                        <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <!-- Width -->
                    <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check"
                        @if(auth()->user()->default_width == 'fluid') checked @endif  />
                        <label class="custom-control-label" for="fluid-check">Fluid</label>
                    </div>
                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check"
                        @if(auth()->user()->default_width == 'boxed') checked @endif
                        />
                        <label class="custom-control-label" for="boxed-check">Boxed</label>
                    </div>

                    <!-- Menu positions -->
                    <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Layout Position</h6>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="menus-position" value="fixed"
                               id="fixed-check"
                               @if(auth()->user()->default_position == 'fixed') checked @endif
                               />
                        <label class="custom-control-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="menus-position" value="scrollable"
                               id="scrollable-check"

                               @if(auth()->user()->default_position == 'scrollable') checked @endif
                               
                               />
                        <label class="custom-control-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <!-- Left Sidebar-->
                    <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="leftsidebar-color" value="light"
                               id="light-check" 
                               @if(auth()->user()->default_sidebar_color == 'light') checked @endif
                               />
                        <label class="custom-control-label" for="light-check">Light</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="leftsidebar-color" value="dark"
                        @if(auth()->user()->default_sidebar_color == 'dark') checked @endif
                               id="dark-check"/>
                        <label class="custom-control-label" for="dark-check">Dark</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="leftsidebar-color" value="brand"
                        @if(auth()->user()->default_sidebar_color == 'brand') checked @endif
                               id="brand-check"/>
                        <label class="custom-control-label" for="brand-check">Brand</label>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input type="radio" class="custom-control-input" name="leftsidebar-color" value="gradient"
                        @if(auth()->user()->default_sidebar_color == 'gradient') checked @endif
                               id="gradient-check"
                               />
                        <label class="custom-control-label" for="gradient-check">Gradient</label>
                    </div>

                    <!-- size -->
                    <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="leftsidebar-size" value="default"
                               id="default-size-check"
                               @if(auth()->user()->default_sidebar_size == 'default') checked @endif
                               />
                        <label class="custom-control-label" for="default-size-check">Default</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="leftsidebar-size" value="condensed"
                        @if(auth()->user()->default_sidebar_size == 'condensed') checked @endif
                               id="condensed-check"/>
                        <label class="custom-control-label" for="condensed-check">Condensed
                            <small>(Extra Small size)</small>
                        </label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="leftsidebar-size" value="compact"
                        @if(auth()->user()->default_sidebar_size == 'compact') checked @endif
                               id="compact-check"/>
                        <label class="custom-control-label" for="compact-check">Compact
                            <small>(Small size)</small>
                        </label>
                    </div>

                    <!-- User info -->
                    {{-- <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                    <div class="custom-control custom-switch mb-1">
                        <input type="checkbox" class="custom-control-input" name="leftsidebar-user" value="fixed"
                               id="sidebaruser-check"/>
                        <label class="custom-control-label" for="sidebaruser-check">Enable</label>
                    </div> --}}


                    <!-- Topbar -->
                    {{-- <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="topbar-color" value="dark"
                               id="darktopbar-check"
                               checked/>
                        <label class="custom-control-label" for="darktopbar-check">Dark</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="topbar-color" value="light"
                               id="lighttopbar-check"/>
                        <label class="custom-control-label" for="lighttopbar-check">Light</label>
                    </div> --}}


                    <button class="btn btn-primary btn-block mt-4" id="resetBtn" onclick="return confirm('are you sure ?') ? resetToDefault() : false;">Reset to Default</button>


                </div>

            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('sweetalert::alert')


<script>
     
    function  toast(message,type){

        Swal.fire({
                title:message,
                icon: type,
              
                showClass: {
                  popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                  popup: 'animate__animated animate__fadeOutUp'
                }
              })

    }
</script>
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- Plugins js-->
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script>
    $(document).ready(function () {
        flatpickr(".flatpicker-range", {
            mode: "range"
        });
        flatpickr(".flatpicker");
    });
</script>


<!-- App js-->
@stack('js')

<script>
function changeDefaultMode(mode){

$.ajax({
    url:"{{ url('change-mode') }}",
    type: "POST",
    data:{
        _token: "{{ csrf_token() }}",
        mode:mode
    },
    success:function(){
        location.reload();
    }

})
}
function changeDefaultWidth(width){

$.ajax({
    url:"{{ url('change-width') }}",
    type: "POST",
    data:{
        _token: "{{ csrf_token() }}",
        width:width
    },
    success:function(){
        location.reload();
    }

})
}
function changeDefaultPosition(position){

$.ajax({
    url:"{{ url('change-position') }}",
    type: "POST",
    data:{
        _token: "{{ csrf_token() }}",
        position:position
    },
    success:function(){
        location.reload();
    }

})
}
function changeDefaultSidebarColor(sidebar_color){

$.ajax({
    url:"{{ url('change-sidebar-color') }}",
    type: "POST",
    data:{
        _token: "{{ csrf_token() }}",
        sidebar_color:sidebar_color
    },
    success:function(){
        location.reload();
    }

})
}



function changeDefaultSidebarSize(sidebar_size){

$.ajax({
    url:"{{ url('change-sidebar-size') }}",
    type: "POST",
    data:{
        _token: "{{ csrf_token() }}",
        sidebar_size:sidebar_size
    },
    success:function(){
        location.reload();
    }

})
}
function resetToDefault(){

$.ajax({
    url:"{{ url('reset-to-default') }}",
    type: "POST",
    data:{
        _token: "{{ csrf_token() }}",
      
    },
    success:function(){
        location.reload();
    }

})
}



 </script>
<script src="{{asset('assets/js/app.min.js')}}"></script>


</body>
</html>
