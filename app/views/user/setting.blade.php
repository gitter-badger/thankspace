@extends('layout.default')


@section('content')

	<div class="page-header" id="banner">
		<div class="text-center">
			<h3>Hai, bagaimana kabar Anda hari ini.</h3>
		</div>
	</div>

	<div class="container">
		<div class="row">
			
			<div class="col-lg-3">
				@include('user._side')
			</div>

			<div class="col-lg-9">
				
				<div class="panel panel-default">
					<div class="panel-body setting-board">
						<ul class="nav nav-tabs text-center">
							<li class="active"><a href="#profile" id="profile-tab" data-toggle="tab">Profile</a></li>
							<li><a href="#password" id="password-tab" data-toggle="tab">Password</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="profile">
								<div class="row">
									<div class="col-sm-10 col-sm-offset-1 text-center">
										@include('user._form_setting')
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="password">
								<div class="row">
									<div class="col-sm-10 col-sm-offset-1 text-center">
										@include('user._form_password')
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

@stop