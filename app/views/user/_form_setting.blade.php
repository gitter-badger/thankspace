{{ Form::open([ 'method' => 'PUT', 'route' => 'user.update_profile', 'class' => 'form-horizontal update-profile-form' ]) }}
	<fieldset>

		<span class="error-alert update-profile-err"></span>
		<span class="success-alert update-profile-scs"></span>
		
		<p>Lengkapi detail data diri anda untuk mempermudah kami memberikan layanan terbaik untuk Anda.</p>

		<div class="form-group">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
					{{ Form::text('firstname', Auth::user()->firstname, [ 'name' => 'firstname', 'class' => 'form-control floating-label', 'placeholder' => 'First name' ]) }}
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
					{{ Form::text('lastname', Auth::user()->lastname, [ 'name' => 'lastname', 'class' => 'form-control floating-label', 'placeholder' => 'Last name' ]) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					{{ Form::email('email', Auth::user()->email, [ 'name' => 'email', 'class' => 'form-control floating-label', 'placeholder' => 'Email', 'data-hint' => 'Masukkan email yang valid' ]) }}
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>

					{{ Form::text('phone', Auth::user()->phone, [ 'name' => 'phone', 'class' => 'form-control floating-label', 'placeholder' => 'Nomor telepon', 'data-hint' => 'Masukkan nomor yang valid' ]) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
					{{ Form::text('address', Auth::user()->address, [ 'name' => 'address', 'class' => 'form-control floating-label', 'placeholder' => 'Alamat', 'data-hint' => 'Masukan alamat' ]) }}
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
						{{ Form::select('gender', [ 'm' => 'Male', 'f' => 'Female' ], Auth::user()->gender, [ 'name' => 'gender', 'class' => 'form-control', 'placeholder' => 'Gender', 'data-hint' => 'Jenis kelamin' ]) }}
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-12">
				<a href="customer-items.php">
					<button type="submit" class="btn btn-primary update-profile" data-loading-text="Menyimpan...">
						<i class="fa fa-check-square-o"></i> Simpan
					</button>
				</a>
			</div>
		</div>
		
	</fieldset>
{{ Form::close() }}