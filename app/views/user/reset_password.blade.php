@extends('layout.default')


@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>

			<div class="col-md-6">

				<div class="page-header text-center">
					<h2>Reset Password</h2>
				</div>

				{{ Form::open(['method' => 'PUT', 'route' => 'user.forgotPasswordProcess', 'class' => 'form-horizontal well']) }}
					{{ Form::hidden('email', $email) }}
					<fieldset>

						@if(Session::has('messages'))
							<div class="alert alert-danger">
								@if( is_array(Session::get('messages')) )
									@foreach(Session::get('messages') as $m)
										<li>{{ $m }}</li>
									@endforeach
								@else
									{{ Session::get('messages') }}
								@endif
							</div>
						@endif
						
						<p class="text-center">
							Silahkan masukan password baru anda. <br> Password minimal 6 karakter atau lebih.
						</p>
						<br>

						<div class="form-group" style="padding-bottom:20px;">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									{{ Form::password('password', [ 'class' => 'form-control floating-label pwd', 'placeholder' => 'Password Baru', 'data-hint' => 'Buat password yang tidak mudah di tebak. Minimal 6 karakter.', 'required' => true ]) }}

								</div>
							</div>
						</div>
						<div class="form-group" style="padding-bottom:20px;">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									{{ Form::password('password_confirmation', [ 'class' => 'form-control floating-label re-pwd', 'placeholder' => 'Ulangi Password Baru', 'data-hint' => 'Konfirmasi password baru', 'required' => true ]) }}
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-12 text-center">
								<button type="submit" class="btn btn-primary" data-loading-text="Menyimpan...">
									<i class="fa fa-check-square-o"></i> Simpan
								</button>
							</div>
						</div>
						
					</fieldset>
				{{ Form::close() }}
			</div>

			<div class="col-md-3"></div>
		</div>
	</div>

@stop