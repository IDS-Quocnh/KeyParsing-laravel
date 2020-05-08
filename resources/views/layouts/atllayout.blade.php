<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{$title}}</title>





    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	
    <!-- Styles -->
    <link href="{{ asset('assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet">
   
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


     <!-- Scripts -->
     <script src="{{ asset('assets/js/main/jquery.min.js') }}"></script>
     <script src="{{ asset('assets/js/main/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>




	<!-- Theme JS files -->
	
	<script src="assets/js/app.js"></script>
	<script src="assets/js/demo_pages/datatables_extension_buttons_html5.js"></script>


 
     <script src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	 <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
       <script src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
     <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
    
	 <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
     <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>

     <script src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
     <script src="{{ asset('assets/js/plugins/notifications/bootbox.min.js') }}"></script>
  
	<script src="assets/js/plugins/notifications/bootbox.min.js"></script>
  <!---->
     <script src="{{ asset('assets/js/app.js') }}"></script>
    
	 

</head>
<body>
    

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="{{ asset('assets/images/logo_light.png') }}" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
    
			<span class="ml-md-3 mr-md-auto">&nbsp;</span>

			<ul class="navbar-nav">

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('assets/images/demo/users/62338.jpg') }}" class="rounded-circle mr-2" height="34" alt="">
						<span> {{ Auth::user()->name }} </span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="icon-switch2"></i> Logout</a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
						
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="{{ asset('assets/images/demo/users/62338.jpg') }}" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-bold">{{ Auth::user()->name }}</div>
								
							</div>

							
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item">
							<a href="{{ route('home') }}" class="nav-link"><i class="icon-home4"></i>Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('cv-list') }}" class="nav-link"><i class="icon-file-upload2"></i>CV Collection</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('ranking') }}" class="nav-link"><i class="icon-list-numbered"></i>CV Ranking</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('quick-ranking') }}" class="nav-link"><i class="icon-list-numbered"></i>Quick Ranking</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('keyword-parsing') }}" class="nav-link"><i class="icon-list-numbered"></i>Keyword Parsing</a>
						</li>
						<li class="nav-item">
							<a href="*" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();"
							class="nav-link"><i class="icon-switch2"></i> Logout</a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex" style="padding:1rem 0">
						<h4>
                        <span class="font-weight-semibold"> {{$title}}</span></h4>
						</div>

					
				</div>

			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
            @yield('content')

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2020. <a href="https://arollotech.com/" target="_blank">Arollo Tech Limited</a> 
                    </span>

				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>