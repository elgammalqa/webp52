<!DOCTYPE html>
<html lang="en-US">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="author" content="AMWAJ Services" />

		<!-- Stylesheets
		============================================= -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	    <link href='https://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>

	    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/front/style.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/front/css/dark.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/front/css/font-icons.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">

	    <link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">	
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="{{asset('assets/front/css/colors.css')}}">
		<link rel="icon" type="image/x-icon" href="{{asset('assets/front/images/favicon.ico')}}" />
		
		<!-- External JavaScripts
		============================================= -->
		<script src="{{asset('assets/front/js/jquery.js')}}"></script>
		<script src="{{asset('assets/front/js/plugins.js')}}"></script>
		<!-- Document Title
		============================================= -->

		<title>
			@section('title')
				AMWAJ Services
			@show
		</title>

		@section('meta_keywords')
		<meta name="keywords" content="AMWAJ, amwaj company in qatar, catering services companies in Qatar,first class in catering, hospitality, AMWAJ Catering Services Company in Qatar, Qatar" />
		@show
		@section('meta_author')
		<meta name="author" content="AMWAJ Services" />
		@show
		@section('meta_description')
        <meta name="description" content="AMWAJ Catering Company First Class Hospitality Services in Qatar. AMWAJ Catering Services Company was incorporated towards the end of 2006 as a fully owned subsidiary of Qatar Petroleum (QP) and in 2012, AMWAJ was acquired by GIS and became a Public Company." />
        @show

	</head>

	<body class="stretched">

		<!-- Document Wratesespper
		============================================= -->
@include('includes.top-bar')

@include('includes.header')

@yield('slider')

	 @include('includes.footer')   <!-- Go To Top
		============================================= -->
		<div id="gotoTop" class="icon-angle-up"></div>

		
		<script src="{{asset('assets/front/js/functions.js')}}"></script>
		<script src="{{asset('assets/front/js/custom.js')}}"></script>
        @yield('scripts')
	</body>
</html>
