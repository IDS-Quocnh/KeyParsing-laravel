<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{$title}} | {{ __('PanNguyen') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/assets/UBold/images/favicon.ico') }}">

	    <!-- App css -->
	    <link href="{{ asset('public/assets/UBold/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
	    <link href="{{ asset('public/assets/UBold/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

	    <link href="{{ asset('public/assets/UBold/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
	    <link href="{{ asset('public/assets/UBold/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

	    <!-- icons -->
	    <link href="{{ asset('public/assets/UBold/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ asset('public/assets/css/layout.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('public/assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('public/assets/css/components.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('public/css/summernote.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <!-- Vendor js -->




        <script src="{{ asset('public/assets/js/main/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/loaders/blockui.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>

        <script src="{{ asset('public/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>

        <script src="public/assets/js/plugins/notifications/bootbox.min.js"></script>
        <script src="{{ asset('public/assets/UBold/js/vendor.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/main/jquery.min.js') }}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
       


    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ml-1">
                                     {{ Auth::user()->default_language }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                                <div class="dropdown-menu  profile-dropdown " style="min-width: auto">
                                    @if(auth()->user()->default_language != "English")
                                        <a href="{!! route('user.change-language', ['en']) !!}" class="dropdown-item notify-item" ><span>English</span></a>
                                    @endif
                                    @if(auth()->user()->default_language != "Italian")
                                            <a href="{!! route('user.change-language', ['it']) !!}" class="dropdown-item notify-item" ><span>Italian</span></a>
                                    @endif
                                </div>
                        </li>
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ml-1">
                                     {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                                {{ csrf_field() }}
                                                                            </form>
                                    <span>{{ __('Log out') }} </span>
                                </a>
                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li>

                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{ asset('public/assets/UBold/images/logo-sm.png') }}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('public/assets/UBold/images/logo-dark.png') }}" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>

                        <a href="{{ route('home') }}" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{ asset('public/assets/UBold/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <h3 style="color:white; margin-top : 20px"> QUOC NGUYEN</h3>
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


                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">{{ __('Navigation') }}</li>

                            <?php 
                                $listMenu = App\Model\Menu::orderBy('id', 'asc')->get();
                            ?>
                            
							@foreach($listMenu as $indexKey => $itemMenu)
							<li>
                                <a href="{{route('menu-management/show',['id' => $itemMenu->id])}}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> {{ $itemMenu->name }}  </span>
                                </a>
                            </li>
                            @endforeach
                            

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('Apps') }}</a></li>
                                            <li class="breadcrumb-item active">{{__($title)}}</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">{{__($title)}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @yield('content')
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer" id="lastfooter">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Quoc Nguyen</a>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">{{ __('About Us') }} </a>
                                    <a href="javascript:void(0);">{{ __('Help') }} </a>
                                    <a href="javascript:void(0);">{{ __('Contact Us') }} </a>
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
                    </div>

                    <div class="tab-pane" id="tasks-tab" role="tabpanel">
                        <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                            <span class="d-block py-1">{{ __('Orther Settings') }} </span>
                        </h6>
                        <div class="px-3">
                            <a href="{{route("menu-management")}}"><h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Menu Management') }} </h6></a>
                            <a href="{{route("catagory-management")}}"><h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Catagory Management') }} </h6></a>
                            <a href="{{route("post-management")}}"><h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Post Management') }} </h6></a>
                            <a href="{{route("upload-image")}}"><h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Upload Image') }} </h6></a>
                        </div>
                    </div>
                    <div class="tab-pane active" id="settings-tab" role="tabpanel">
                        <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                            <span class="d-block py-1">{{ __('Theme Settings') }}</span>
                        </h6>

                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>{{ __('Customize') }} </strong> {{ __('the overall color scheme, sidebar menu, etc.') }}
                            </div>

                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Color Scheme') }}</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                                    id="light-mode-check" checked />
                                <label class="custom-control-label" for="light-mode-check">{{ __('Light Mode') }}</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark"
                                    id="dark-mode-check" />
                                <label class="custom-control-label" for="dark-mode-check">{{ __('Dark Mode') }}</label>
                            </div>

                            <!-- Width -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Width') }}</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked />
                                <label class="custom-control-label" for="fluid-check">{{ __('Fluid') }}</label>
                            </div>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                                <label class="custom-control-label" for="boxed-check">{{ __('Boxed') }}</label>
                            </div>

                            <!-- Menu positions -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Menus (Leftsidebar and Topbar) Positon') }}</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="menus-position" value="fixed" id="fixed-check"
                                    checked />
                                <label class="custom-control-label" for="fixed-check">{{ __('Fixed') }}</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="menus-position" value="scrollable"
                                    id="scrollable-check" />
                                <label class="custom-control-label" for="scrollable-check">{{ __('Scrollable') }}</label>
                            </div>

                            <!-- Left Sidebar-->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Left Sidebar Color') }}</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="light" id="light-check" checked />
                                <label class="custom-control-label" for="light-check">{{ __('Light') }}</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="dark" id="dark-check" />
                                <label class="custom-control-label" for="dark-check">{{ __('Dark') }}</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="brand" id="brand-check" />
                                <label class="custom-control-label" for="brand-check">{{ __('Brand') }}</label>
                            </div>

                            <div class="custom-control custom-switch mb-3">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="gradient" id="gradient-check" />
                                <label class="custom-control-label" for="gradient-check">{{ __('Radient') }}</label>
                            </div>

                            <!-- size -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Left Sidebar Size') }}</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="default"
                                    id="default-size-check" checked />
                                <label class="custom-control-label" for="default-size-check">{{ __('Default') }}</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="condensed"
                                    id="condensed-check" />
                                <label class="custom-control-label" for="condensed-check">{{ __('Condensed') }} <small>({{ __('Extra Small size') }})</small></label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="compact"
                                    id="compact-check" />
                                <label class="custom-control-label" for="compact-check">{{ __('Compact') }}  <small>({{ __('Small size') }} )</small></label>
                            </div>

                            <!-- User info -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Sidebar User Info') }} </h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" name="leftsidebar-user" value="fixed" id="sidebaruser-check" />
                                <label class="custom-control-label" for="sidebaruser-check">{{ __('Enable') }}</label>
                            </div>


                            <!-- Topbar -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">{{ __('Topbar') }}</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="topbar-color" value="dark" id="darktopbar-check"
                                    checked />
                                <label class="custom-control-label" for="darktopbar-check">{{ __('Dark') }}</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="topbar-color" value="light" id="lighttopbar-check" />
                                <label class="custom-control-label" for="lighttopbar-check">{{ __('Light') }}</label>
                            </div>


                            <button class="btn btn-primary btn-block mt-4" id="resetBtn">{{ __('Reset to Default') }}</button>
                        </div>

                    </div>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <!-- App js -->
        <script src="{{ asset('public/assets/UBold/js/app.min.js') }}"></script>
        <script src="{{ asset('public/js/summernote.min.js') }}"></script>

        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
            $('.modal').on('hidden.bs.modal', function () {
        		location.reload();
        	});
        </script>
    </body>
<style>
    .dataTables_length>label{
        display : flex;
    }
    .select2-selection__rendered{
        line-height : 24px !important;
    }
    .dataTables_length label select2-selection--single{
        width : 45px;
    }
    .page-title{
        line-height: 75px !important;
    }
</style>

</html>