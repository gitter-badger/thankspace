@extends('layout.default')


@section('content') 

	<div class="page-header" id="banner">
		<div class="row text-center">
			<h3>Administration Panel</h3>
		</div>
	</div>
	<div class="container">
		<div class="col-lg-12 col-centered">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						@include('admin._stats')
					</div>
					
					<div class="col-lg-12">
						<hr>
					</div>
					
					<div class="col-lg-12 text-center">
						<h3>Tambahkan Member</h3>
						
						@if( Session::has('messages') )
						<p>
							@foreach( Session::get('messages') as $m )
								<span class="error-alert">
									<i class="fa fa-meh-o"></i> {{ $m }}
								</span>
								<br>
							@endforeach
						</p>
						@endif
						
						<p>Isi data keanggotaan baru dengan cermat.</p>
						
						{{ Form::open([ 'route' => 'user.member_add.post', 'method' => 'POST', 'class' => 'form-horizontal' ]) }}
							<fieldset>
								<div class="form-group">                    
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{ Form::text('firstname', null, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukkan nama depan Anda', 'placeholder' => 'Nama Depan', 'required' => true ]) }}
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{ Form::text('lastname', null, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukkan nama belakang Anda', 'placeholder' => 'Nama Belakang', 'required' => true ]) }}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
											{{ Form::email('email', null, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukan email yang valid', 'placeholder' => 'Email', 'required' => true ]) }}
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
											{{ Form::number('phone', null, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukkan nomor yang valid', 'placeholder' => 'Nomor telepon', 'required' => true ]) }}
										</div>
									</div>
								</div>
								<div class="form-group">                    
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{ Form::text('address', null, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukkan Alamat', 'placeholder' => 'Alamat', 'required' => true ]) }}
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{ Form::select('city_id', $list_cities, null, [ 'class' => 'form-control', 'required' => true, 'style' => 'margin-top: 5px;' ]) }}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{
												Form::select('gender', [
													'm'	=> 'Male',
													'f'	=> 'Female',
												], null, [ 'class' => 'form-control' ])
											}}
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{
												Form::select('type', [
													'admin'		=> 'Admin',
													'user'		=> 'Customer',
													'driver'	=> 'Delivery Team',
												], null, [ 'class' => 'form-control' ])
											}}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-12 text-center">
										<button type="submit" class="btn btn-primary"><i class="mdi-social-person-add"></i> Tambahkan</button>
										<a href="{{ route('user.member_list') }}" class="btn btn-warning">Batalkan</a>
									</div>
								</div>
							</fieldset>
							{{ Form::hidden('via', 'admin') }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>

@stop