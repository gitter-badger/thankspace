{{-- Modal Log In - Mulai --}}
<div class="modal fade text-center bs-example-modal-sm" id="sign-in-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Selamat Datang Kembali!</h4><hr>
			</div>
			<div class="modal-body" style="padding:0px 24px;">
				{{ Form::open([ 'method' => 'POST', 'route' => 'user.signin', 'class' => 'form-horizontal sign-in-form' ]) }}
					<fieldset>
						<span class="error-alert login-err"></span>
						<p>Silahkan Sign In dengan akun Anda</p>
						<div class="form-group">
							<div class="col-lg-12">
								<div class="input-group margin-bottom-sm">
									<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
									<input type="email" name="email" class="form-control" placeholder="Email" required="1">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input class="form-control" name="password" id="passwordfield" type="password" placeholder="Password" required="1">
								</div>				
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-12">
								<button type="submit" class="btn btn-primary login" data-loading-text="Authenticating..." style="width:100%;">
									<i class="fa fa-sign-in"></i> Sign In
								</button>
							</div>
						</div>
					</fieldset>
				{{ Form::close() }}
			</div>
			<div class="modal-footer">
				Lupa password? klik <a href="#forgot-modal" data-toggle="modal" data-dismiss="modal">di sini</a><br>
				Customer baru? Horee, Sign Up <a href="#sign-up-modal" data-toggle="modal" data-dismiss="modal">di sini</a>
			</div>
		</div>
	</div>
</div>
{{-- Modal Log In - Selesai --}}


{{-- Modal Sign Up - Mulai --}}
<div class="modal fade text-center" id="sign-up-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Pendaftaran Customer</h4><hr>
			</div>
			<div class="modal-body" style="padding:0px 24px;">
				{{ Form::open([ 'method' => 'POST', 'route' => 'user.signup', 'class' => 'form-horizontal sign-up-form' ]) }}
					<fieldset>
						<span class="error-alert regis-err"></span>
						<p>Isi data Anda untuk pendaftaran </p>
						<div class="form-group">                    
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
									<input class="form-control floating-label" data-hint="Masukkan nama asli Anda" name="firstname" type="fname" placeholder="Nama Depan" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
									<input class="form-control floating-label" name="lastname" type="lname" placeholder="Nama Belakang" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
									<input type="email" class="form-control floating-label" data-hint="Masukkan email yang valid" name="email" placeholder="Email" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
									<input type="number" class="form-control floating-label" data-hint="Masukkan nomor yang valid" name="phone" placeholder="Nomor telepon" required>
								</div>
							</div>
						</div>
						<div class="form-group">                    
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input class="form-control floating-label pwd" data-hint="Buat password yang tidak mudah di tebak. Minimal 6 karakter." minlength="6" name="password" type="password" placeholder="Password" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input class="form-control floating-label re-pwd" data-hint="Ingat password Anda?" type="password" placeholder="Ulangi Password" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-12">
								<div class="checkbox">
									<label>	
										<input type="checkbox" onchange="document.getElementById('check').disabled = !this.checked;" /> Saya telah membaca dan menyetujui <a href="{{ route('page.tos') }}" target="_blank">Syarat & Ketentuan Thankspace</a>.
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-12">
								<button type="submit" class="btn btn-primary regis" data-loading-text="Registering..." id="check" disabled><i class="fa fa-user-plus"></i> Sign Up</button>
							</div>
						</div>
					</fieldset>
					{{ Form::hidden('via', 'register') }}
				{{ Form::close() }}
			</div>
			<div class="modal-footer">
				Sudah mempunyai akun? <a href="#sign-in-modal" data-toggle="modal" data-dismiss="modal">Sign In</a>
			</div>
		</div>
	</div>
</div>
{{-- Modal Sign Up - Selesai --}}


{{-- Modal Forgot Password  - Mulai --}}
<div class="modal fade text-center" id="forgot-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Lupa Password</h4><hr>
			</div>
			<div class="modal-body">
				{{ Form::open(['method' => 'POST', 'url' => route('user.forgotPassword'), 'class' => 'form-horizontal']) }}
					<fieldset>
						<p>Apakah password Anda kombinasi huruf dan angka? nama sebuah kota? <br>atau nama mantan?<br><br>Jangan khawatir, tim peramal kami akan masuk ke ingatan terdalam Anda dan mengembalikan Password ke email yang terdaftar di Thankspace</p>
						<div class="form-group">
							<div class="col-lg-12">
								<div class="input-group margin-bottom-sm">
									<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
									{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email anda']) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-12">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-refresh"></i>
									Abracadabra
								</button>
							</div>
						</div>
					</fieldset>
				{{ Form::close() }}
			</div>
			<div class="modal-footer">
				Sudah ingat password Anda? coba <a href="#sign-in-modal" data-toggle="modal" data-dismiss="modal">Sign In</a>
			</div>
		</div>
	</div>
</div>
{{-- Modal Forgot Password - Selesai --}}