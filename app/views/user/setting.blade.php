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
							<div role="tabpanel" class="tab-pane fade" id="password">
							<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

@stop