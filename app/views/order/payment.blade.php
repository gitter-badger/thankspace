@extends('layout.default')


@section('content')

	@include('order._board')

	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered">
				<div class="panel panel-default">
					<div class="panel-body ">
						<center>
							<h4>Silakan masukkan detail diri Anda</h4><hr>
						</center>
						<br><br>
						{{ Form::open(['method' => 'POST', 'route' => 'order.progress', 'class' => 'form-horizontal']) }}
							{{ Form::hidden('redirect_to', route('order.review')) }}
							<fieldset>
								<div class="form-group">
									<label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Sudah terdaftar?</label>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<div class="radio radio-primary">
											<label>
												{{ Form::radio('memberstatus', 'signin', true, ['id' => 'id_radio2']) }} Ya, Saya customer lama 
											</label>
											<label>
												{{ Form::radio('memberstatus', 'signup', false, ['id' => 'id_radio1']) }} Belum, saya ingin mendaftar
											</label>
										</div>
									</div>
								</div>
								<!-- div belum -->
								<div id="Wowdiv" >
									<div class="form-group">
										<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Nama Lengkap</label>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-bottom:20px;">
											<input name="firstname" class="form-control floating-label" data-hint="Masukkan nama asli Anda" type="fname" placeholder="Nama Depan">
										</div>
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-bottom:20px;">
											<input name="lastname" class="form-control floating-label" type="lname" placeholder="Nama Belakang">
										</div>
									</div>
									<div class="form-group">
										<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Email</label>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-bottom:20px;">
											<input type="email" name="email" class="form-control" data-hint="Masukkan email yang valid">
										</div>
									</div>
									<div class="form-group">
										<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">No. Telepon</label>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-bottom:20px;">
											<input type="number" name="phone" class="form-control" data-hint="Masukkan nomor yang valid">  
										</div>
									</div>
									<div class="form-group">
										<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Alamat Anda</label>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-bottom:20px;">
											<input name="address" class="form-control" type="address" data-hint="Alamat diperlukan untuk pengiriman">
										</div>
									</div>
									<div class="form-group">
										<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Password</label>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-bottom:20px;">
											<input name="password" class="form-control floating-label" data-hint="Buat password yang tidak mudah di tebak. Minimal 6 karakter. " type="password" placeholder="Password">
										</div>
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-bottom:20px;">
											<input name="password_confirmation" class="form-control floating-label" data-hint="Ingat password Anda?" type="password" placeholder="Ulangi Password">
										</div>
									</div>
									<div class="form-group">
										<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label"></label>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
											<div class="checkbox">
												<label> 
													<input type="checkbox" checked="" /> Saya telah membaca dan menyetujui <a href="terms-and-conditions.php" target="_blank">Syarat & Ketentuan Thankspace</a>.
												</label>
											</div>       
										</div>
									</div>
								</div>
								<!-- div belum -->

								<!-- div ya -->
								<div id="div2">
									<div class="form-group">
										<label for="select" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Login </label>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-bottom:20px;">
											<input type="email" name="email" class="form-control floating-label" placeholder="Email">        
										</div>
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-bottom:20px;">
											<input name="password" class="form-control floating-label" type="password" placeholder="Password">
										</div>
									</div>
								</div>
								<!-- div ya -->

								<hr>
								<center>
									<h3>Pilih Cara Pembayaran</h3>
								</center>
								<br><br>
								<div class="form-group">
									<label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Metode Pembayaran?</label>
									<div class="col-lg-9 col-md-9col-sm-9 col-xs-9">
										<div class="radio radio-primary">
											<label>
												<input type="radio" name="method" id="payment1" value="banktransfer" checked /> Bank Transfer
											</label>
										</div>   
									</div>
								</div>
								<div class="form-group"> 
									<label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Pesan Tambahan</label>
									<div class="col-lg-9 col-md-9col-sm-9 col-xs-9">
										<textarea class="form-control" name="message" placeholder="Optional"></textarea>
									</div>
								</div>
							</fieldset>
							<center>
								<button type="submit" class="btn btn-primary">
									Lanjutkan
								</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop