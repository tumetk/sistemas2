<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>
		@section('title')
			Car wash
		@show
		</title>

		<!-- Bootstrap Core CSS -->
		<link href={{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/css/bootstrap.min.css")}} rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href={{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css")}} rel="stylesheet">

		<!-- Custom CSS -->
		<link href={{asset("assets/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css")}} rel="stylesheet">
		<link href={{asset("assets/css/base.css")}} rel="stylesheet">
		<!-- Custom Fonts -->
		<link href={{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css">
		<link href={{asset('assets/css/jquery-ui.structure.min.css')}} rel="stylesheet" type="text/css">
    	<link href={{asset('assets/css/jquery-ui.theme.min.css')}} rel="stylesheet" type="text/css">
    	<link href={{asset('assets/css/jquery-ui.min.css')}} rel="stylesheet" type="text/css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		@yield('extra_css')
	</head>

	@section('body_tag')
	<body>
	@show
		<div id="wrapper">
			@include('layouts.navigation')
			<div id="page-wrapper" class="container-fluid">
				@yield('content')
			</div>
		</div>

		 <!-- jQuery -->
		<script src = {{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/jquery/dist/jquery.min.js")}}></script>

		<!-- Bootstrap Core JavaScript -->
		<script src = {{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/js/bootstrap.min.js")}} ></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src = {{asset("assets/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.js")}} ></script>

		<!-- Custom Theme JavaScript -->
		<script src = {{asset("assets/startbootstrap-sb-admin-2-1.0.7/dist/js/sb-admin-2.js")}} ></script>
		<script type="text/javascript">
			var base_url = "{{url('/')}}";
		</script>
		@yield('extra_scripts')
	</body>
</html>