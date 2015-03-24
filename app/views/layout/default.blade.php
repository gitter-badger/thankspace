<!DOCTYPE html>
<html>
<head>
	@include('partial.head')
</head>
<body id="home">

	@section('header')
		@include('partial.header')
	@show

	
	@yield('after_header')
	
	
	@yield('content')


	@include('partial.footer')
	@include('partial.foot')
</body>
</html>