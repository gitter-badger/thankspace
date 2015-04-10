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
						
						@if ( Session::has('message') )
						<p>
							@if ( Session::get('message') == 'success' )
							<span class="error-alert">
								<i class="fa fa-meh-o"></i> {{ Session::get('message') }}
							</span>
							@endif
						</p>
						@endif
						
						<p>Isi data keanggotaan baru dengan cermat.</p>
						
						<form class="form-horizontal">
							<fieldset>
								<div class="form-group">                    
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											<input class="form-control floating-label" data-hint="Masukkan nama depan Anda" name="firstname" type="text" placeholder="Nama Depan" required>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											<input class="form-control floating-label" data-hint="Masukkan nama belakang Anda" name="lastname" type="text" placeholder="Nama Belakang" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
											<input type="email" class="form-control floating-label" name="email" data-hint="Masukkan email yang valid" type="email" placeholder="Email" required>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
											<input type="number" class="form-control floating-label" name="phone" data-hint="Masukkan nomor yang valid" type="text" placeholder="Nomor telepon" required>
										</div>
									</div>
								</div>
								<div class="form-group">                    
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											<input class="form-control floating-label" data-hint="Masukkan Alamat" name="address" type="text" placeholder="Alamat" required>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
												<select class="form-control" name="gender">
													<option value="m">Male</option>
													<option value="f">Female</option>
												</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
												<select class="form-control" name="type">
													<option value="admin">Admin</option>
													<option value="user">Customer</option>
													<option value="driver">Delivery Team</option>
												</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-12 text-center">
										<button type="submit" class="btn btn-primary"><i class="mdi-social-person-add"></i> Tambahkan</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop