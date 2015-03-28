<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ThankSpace - More space for you | On-Demand Storage in Indonesia</title>
	<link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@section('head')
		@include('partial.head')
	@show

</head>
<body id="home">

	@section('header')
		@include('partial.header')
	@show

	
	@yield('after_header')
	
	
	@yield('content')


	@section('footer')
		@include('partial.footer')
	@show
	
	@section('foot')
		@include('partial.foot')
	@show

</body>
</html>