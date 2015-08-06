{{ Form::open([ 'method' => 'PUT', 'route' => 'user.update_password', 'class' => 'form-horizontal update-password-form' ]) }}
	<fieldset>

		<span class="error-alert update-password-err"></span>
		<span class="success-alert update-password-scs"></span>
		
		<p>Di sini Anda bisa memperbarui password / kata sandi Anda.</p>

		<div class="form-group" style="padding-bottom:20px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					{{ Form::password(null, [ 'class' => 'form-control floating-label old-pwd', 'placeholder' => 'Password Lama', 'data-hint' => 'Ingat password anda ?', 'required' => true ]) }}
				</div>
			</div>
		</div>
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
					{{ Form::password('password_confirm', [ 'class' => 'form-control floating-label re-pwd', 'placeholder' => 'Ulangi Password Baru', 'data-hint' => 'Konfirmasi password baru', 'required' => true ]) }}
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-12">
				<a href="customer-items.php">
					<button type="submit" class="btn btn-primary" data-loading-text="Menyimpan...">
						<i class="fa fa-check-square-o"></i> Simpan
					</button>
				</a>
			</div>
		</div>
		
	</fieldset>
{{ Form::close() }}