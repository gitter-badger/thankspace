@extends('layout.default')


@section('after_header')
	@include('partial.banner')
@stop


@section('content')
	
	<div class="section-tout">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
					<h3><img class="img-responsive" src="assets/img/thankspace-1.png"><br> 1. We deliver boxes</h3>
					<p>Kami mengantarkan <i>Storage Box</i> yang diperlukan ke tempat Anda.</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<h3><img class="img-responsive" src="assets/img/thankspace-2.png"><br> 2. You pack items</h3>
					<p>Anda (atau kami) mengepak barang-barang Anda ke dalam <i>Storage Box</i> yang kami sediakan.</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<h3><img class="img-responsive" src="assets/img/thankspace-3.png"><br> 3. We collect boxes</h3>
					<p>Kami mengambil <i>Storage Box</i> dan mengirimnya ke <i>Warehouse</i> keren milik ThankSpace.</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<h3><img class="img-responsive" src="assets/img/thankspace-4.png"><br> 4. You request your boxes back on-demand</h3>
					<p>Anda dapat meminta kami mengirimkan kembali <i>Storage Box</i> Anda sewaktu-waktu.</p>
				</div>
			</div>
		</div>
	</div>
	{{-- section-tout - end --}}


	<div class="section-preview" id="location">
		<div class="container location">
			<div class="row">
				<div class="col-lg-12" id="step3" ><center>
					<h1>Location</h1>
					<p class="lead">
						ThankSpace saat ini melayani layanan <i>Storage on Demand</i> khusus area kota Surabaya & Denpasar.<br>
						Jakarta (soon) • Singapore (soon) • Shanghai (soon)
					</p>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="preview">
						<div class="image">
							<div class="img-responsive" id='thankspacesby'></div>
						</div>
						<div class="options">
							<h3>ThankSpace Surabaya</h3>
							<p>
								Jl. Gembong Sawah No.6, Surabaya, Jawa Timur. 60141<br>
								support@thankspace.com	
							</p>													
								<h4>Call us now </h4>
								<h3>(031) 3713603</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="preview">
						<div class="image">
							<div class="img-responsive" id='thankspacebali'></div>
						</div>
						<div class="options">
							<h3>ThankSpace Denpasar</h3>
							<!--<p>
								Jl. Mahendradatta Selatan 7A, Denpasar, Bali, 80361 <br>
								support@thankspace.com<br>	
							</p>													
								<h4>Hubungi kami? </h4>-->
								<h3>(Soon)</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-6"><center>
					<p class="lead">
						Ingin membuka layanan Storage on Demand di kota Anda? <a href="{{ route('page.partnership') }}">Kerjasama</a> dengan ThankSpace sekarang!
					</p>
				</div>

			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-6">
				<h2>Reliable Storage on Demand in Indonesia</h2>
				<p>
					<ul>
						<li>Gudang penyimpanan bulanan mulai dari Rp. 100.000</li>
						<li>Menerima penyimpanan barang oversized / overlength / overwidth / overheight</li>
						<li>Tim yang bisa membantu pengepakan barang Anda</li>
						<li>Tracking status barang secara online</li>
						<li>Warehouse kami memiliki keamanan yang terjamin</li>
					</ul>
				</p>
				<center>
				<a href="{{ route('order.index') }}"><button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Order Sekarang</button></a>
				</center>
			</div>
			<div class="col-lg-6 col-sm-6">
				<div><img class="img-responsive" src="assets/img/box2.png"></div>
			</div>
		</div>
	</div>


	<div class="section-preview" id="pricing">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center" id="step4" >
					<h1>Pricing</h1>
					<p class="lead">
						<i>Storage on Demand</i> / layanan gudang penyimpanan dengan kemudahan pembayaran sesuai dengan <i>space</i> yang Anda dibutuhkan.
					</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="preview">
						<div class="image">
							<a target="_blank" href="">
								<img class="img-responsive" src="assets/img/services-1.jpg" alt="Front Row">
							</a>
						</div>
						<div class="options">
							<h3>Rp. 100.000/bulan<br>untuk 1 box</h3>
							<p style="text-align:right">
								<ul style="text-align:left">
									<li>Kami kirim dan ambil <i>Storage Box</i> di tempat Anda gratis</li>
									<li>Butuh bantuan pengepakan? Tim kami bantu dengan senang hati</li>
									<li>Kirim kembali beberapa atau semua Box tanpa biaya, Gratis!</li>
									<li><i>Warehouse</i> yang aman</li>
								</ul>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="preview">
						<div class="image">
							<a target="_blank" href="">
								<img class="img-responsive" src="assets/img/services-2.jpg" alt="Clean Canvas">
							</a>
						</div>
						<div class="options">
							<h3>Rp. 150.000/bulan<br>untuk 1 barang</h3>
							<p style="text-align:right">
								<ul style="text-align:left">
									<li>Wow! ingin menyimpan Vespa Anda? No problem</li>
									<li>Kami juga menerima barang-barang oversized Anda</li>
									<li>Berat barang maksimal 25kg dan panjang maksimal 2 meter</li>
									<li><i>Warehouse</i> yang  aman</li>
								</ul>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="preview">
						<div class="image">
							<a target="_blank" href="">
								<img class="img-responsive" src="assets/img/services-3.jpg" alt="Clean Canvas">
							</a>
						</div>
						<div class="options">
							<h3>Flexible Price<br>untuk tiap barang</h3>
							<p style="text-align:right">
								<ul style="text-align:left">
									<li>Kami menerima penyimpanan barang oversized /over length /over width /over height  Anda</li>
									<li>Penanganan khusus dari sisi operasional</li>
									<li>Minimal 3 bulan</li>
									<li><i>Warehouse</i> yang aman</li>
								</ul>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 text-center" >
					<p>
						<a id="step5" href="{{ route('order.index') }}" class="btn btn-primary btn-lg">
							<i class="fa fa-shopping-cart"></i> <span>Order Sekarang</span>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>

@stop