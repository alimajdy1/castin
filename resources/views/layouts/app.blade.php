<!DOCTYPE html>
<html>
	<head>
		<title>Cast-In - @yield('title')</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('assets/fonts/fonts.css') }}" type="text/css" rel="stylesheet">
		<style>
			.error{
				font-size: 17px !important;
			}
		</style>
		@yield('style')
	</head>
	<body>
  @yield('content')
  <script src="{{ asset('assets/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
	@yield('jquery_content')
	</body>
</html>
