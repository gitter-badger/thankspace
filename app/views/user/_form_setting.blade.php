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
		
		<p>Lengkapi detail data diri anda untuk mempermudah kami memberikan layanan terbaik untuk Anda.</p>

		<div class="form-group">                    
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
					{{ Form::text('firstname', null, ['class' => 'form-control floating-label', 'placeholder' => 'First name', 'disabled' => true]) }}
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
					{{ Form::text('lastname', null, ['class' => 'form-control floating-label', 'placeholder' => 'Last name', 'disabled' => true]) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					{{ Form::email('email', null, ['class' => 'form-control floating-label', 'placeholder' => 'Email', 'disabled' => true, 'data-hint' => 'Masukkan email yang valid']) }}
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>

					{{ Form::text('phone', null, ['class' => 'form-control floating-label', 'placeholder' => 'Nomor telepon', 'data-hint' => 'Masukkan nomor yang valid']) }}
				</div>
			</div>
		</div>
		<div class="form-group">                    
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					{{ Form::password('password', ['class' => 'form-control floating-label', 'placeholder' => 'Password', 'data-hint' => 'Buat password yang tidak mudah di tebak. Minimal 6 karakter.']) }}

				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					{{ Form::password('password_confirmation', ['class' => 'form-control floating-label', 'placeholder' => 'Password', 'data-hint' => 'Ingat password anda ?']) }}
				</div>
			</div>
		</div>
		<div class="form-group">                    
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
					{{ Form::text('address', null, ['class' => 'form-control floating-label', 'placeholder' => 'Alamat', 'data-hint' => 'Masukan alamat']) }}
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
						{{ Form::select('gender', ['m' => 'Male', 'f' => 'Female'], null, ['class' => 'form-control', 'placeholder' => 'Gender', 'data-hint' => 'Jenis kelamin']) }}
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-12">
				<a href="customer-items.php">
					<button type="submit" class="btn btn-primary" id="check" ><i class="mdi-social-person-add"></i> Simpan</button>
				</a>
			</div>
		</div>
		
	</fieldset>
{{ Form::close() }}