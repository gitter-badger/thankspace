@extends('layout.default')

@section('after_header')
	
@stop

@section('content')
	
	<div class="page-header" id="banner">
		<div class="row text-center">
			<h3>Contact Us</h3>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 hidden-md hidden-sm hidden-xs ">
			@include('page._side')
			</div>
			<div class="col-lg-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2 id="navbar">Lorem ipsum dolor sit amet</h2>
						<p>Lorem ipsum dolor sit amet bla bla bla konten yang diutamakan Lorem ipsum dolor sit amet bla bla bla konten yang diutamakan Lorem ipsum dolor sit amet bla bla bla konten yang diutamakan</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop