<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMTU Perminyakan ITB</title>

	<!-- Bootstrap 3.3.2 -->
	<link href="{{ asset('/assets/admin-lte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="{{ asset('/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="{{ asset('/assets/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Icheck -->
	<link href="{{ asset('/assets/admin-lte/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="{{ asset("/assets/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
	page. However, you can choose any other skin. Make sure you
	apply the skin class to the body tag so the changes take effect.
-->
<link href="{{ asset("/assets/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="login-page full ">
	<div class="fading">

		@yield('content')

		<!-- Scripts -->
		<script src="{{ asset ("/assets/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
		<script src="{{ asset ("/assets/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
		<script src="{{ asset ("/assets/admin-lte/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>
		<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
		</script>
	</div>
</body>
</html>
