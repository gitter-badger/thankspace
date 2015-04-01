{{ Form::open(['url' => '', 'method' => 'PUT', 'class' => 'form-horizontal']) }}
	<fieldset>

		@if(Session::has('errors'))
			<span class="error-alert"> <i class="fa fa-meh-o"></i> 
			Jangan lupa isi nama Anda.</span><br>
			<span class="error-alert"> <i class="fa fa-meh-o"></i> 
			Format No telepon Anda tidak benar.</span><br>
			<span class="error-alert"> <i class="fa fa-meh-o"></i> 
			Maaf, alamat email sudah terdaftar di Thankspace.</span><br>
			<span class="error-alert"> <i class="fa fa-meh-o"></i> 
			Maaf, password yang Anda masukkan tidak sama.<br></span><br>
			<span class="success-alert"> <i class="fa fa-smile-o"></i> 
			Kami suka sekali nama Anda.</span><br>
			<span class="success-alert"> <i class="fa fa-smile-o"></i> 
			Email tersedia untuk di daftarkan.</span><br>
			<span class="success-alert"> <i class="fa fa-smile-o"></i> 
			Jangan sampai lupa dengan Password Anda.</span>
		@endif
		
		<p>Di sini Anda bisa memperbarui password / kata sandi Anda.</p>

		<div class="form-group" style="padding-bottom:20px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					{{ Form::password('password_confirmation', [ 'class' => 'form-control floating-label', 'placeholder' => 'Password Lama', 'data-hint' => 'Ingat password anda ?' ]) }}
				</div>
			</div>
		</div>
		<div class="form-group" style="padding-bottom:20px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					{{ Form::password('password', [ 'class' => 'form-control floating-label', 'placeholder' => 'Password Baru', 'data-hint' => 'Buat password yang tidak mudah di tebak. Minimal 6 karakter.' ]) }}

				</div>
			</div>
		</div>
		<div class="form-group" style="padding-bottom:20px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					{{ Form::password('password_confirmation', [ 'class' => 'form-control floating-label', 'placeholder' => 'Ulangi Password Baru', 'data-hint' => 'Konfirmasi password baru' ]) }}
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