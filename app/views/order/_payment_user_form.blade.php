<div class="form-group">
	<label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Sudah terdaftar?</label>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
		<div class="radio radio-primary">
			<label>
				{{ Form::radio('user_action', 'signin', true, ['id' => 'id_radio2']) }} Ya, Saya customer lama 
			</label>
			<label>
				{{ Form::radio('user_action', 'signup', false, ['id' => 'id_radio1']) }} Belum, saya ingin mendaftar
			</label>
		</div>
	</div>
</div>
<!-- div belum -->
<div id="Wowdiv" >
	<div class="form-group">
		<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Nama Lengkap</label>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-bottom:20px;">
			{{ Form::text('firstname', null, ['class' => 'form-control floating-label', 'data-hint' => 'Masukkan nama asli Anda', 'placeholder' => 'Nama Depan']) }}
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-bottom:20px;">
			{{ Form::text('lastname', null, ['class' => 'form-control floating-label', 'placeholder' => 'Nama Belakang']) }}
		</div>
	</div>
	<div class="form-group">
		<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Email</label>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-bottom:20px;">
			{{ Form::email('email', null, ['class' => 'form-control floating-label', 'data-hint' => 'Masukan email yang valid', 'placeholder' => 'Email anda']) }}
		</div>
	</div>
	<div class="form-group">
		<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">No. Telepon</label>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-bottom:20px;">
			{{ Form::text('phone', null, ['class' => 'form-control floating-label', 'data-hint' => 'Masukkan nomor yang valid', 'placeholder' => 'Nomor telfon']) }}
		</div>
	</div>
	<div class="form-group">
		<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Alamat Anda</label>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-bottom:20px;">
			{{ Form::text('address', null, ['class' => 'form-control floating-label', 'data-hint' => 'Alamat diperlukan untuk pengiriman', 'placeholder' => 'Alamat anda']) }}
		</div>
	</div>
	<div class="form-group">
		<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Password</label>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-bottom:20px;">
			{{ Form::password('password', ['class' => 'form-control floating-label', 'data-hint' => 'Buat password yang tidak mudah di tebak. Minimal 6 karakter', 'placeholder' => 'Password anda']) }}
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-bottom:20px;">
			{{ Form::password('password_confirmation', ['class' => 'form-control floating-label', 'placeholder' => 'Ulangi Password']) }}
		</div>
	</div>
	<div class="form-group">
		<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label"></label>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
			<div class="checkbox">
				<label> 
					<input type="checkbox" name="agree" checked="true" /> Saya telah membaca dan menyetujui <a href="terms-and-conditions.php" target="_blank">Syarat & Ketentuan Thankspace</a>.
				</label>
			</div>       
		</div>
	</div>
</div>


<div id="div2">
	<div class="form-group">
		<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Login </label>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-bottom:20px;">
			{{ Form::email('credentials[email]', null, ['class' => 'form-control floating-label', 'placeholder' => 'Email anda']) }}
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-bottom:20px;">
			{{ Form::password('credentials[password]', ['class' => 'form-control floating-label', 'placeholder' => 'Password anda']) }}
		</div>
	</div>
</div>