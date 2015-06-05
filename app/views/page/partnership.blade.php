@extends('layout.default')

@section('after_header')
	
@stop

@section('content')
	
	<div class="page-header" id="banner">
		<div class="row text-center">
			<h3>Partnership</h3>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 hidden-md hidden-sm hidden-xs ">
			@include('page._side')
			</div>
			<div class="col-lg-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2 id="navbar">Sistim Affiliasi</h2>
						<p>Program Afiliasi ThankSpace merupakan penghargaan secara financial kepada mereka yang mereferensikan website kami kepada konsumen & sebagai ucapan terima kasih karena telah mendatangkan konsumen. 
						<p>Hal ini dibentuk dengan konsep yang benar-benar menguntungkan bagi Affiliate, dimana pihak Affiliate akan mendapatkan komisi atas setiap penggunaan jasa ThankSpace yang dilakukan dari link/counter mereka.
					<p class="text-center">
						<a id="step5" href="{{ route('order.index') }}" class="btn btn-warning btn-lg">
							<i class="fa fa-shopping-cart"></i> <span>Info Detail & Daftar Affiliasi</span>
						</a>
					</p>
						<h2 id="navbar">Sistim Franchise / Buka Cabang</h2>
							<ul>
								<li>Customer melakukan order secara online di www.thankspace.com (atau telepon kami di 800-920-9440) dan menjadwalkan waktu pengantaran box penyimpanan.
								</li>
								<li>Tim ThankSpace akan mengantarkan box penyimpanan kepada customer di waktu yang sudah dijadwalkan. 
								</li>
								<li>Tim kami menunggu selama 20 menit saat customer mengepak barang-barang mereka, customer juga dapat menjadwalkan waktu pengambilan barang-barang mereka di kemudian hari. Kemudian, Box akan disimpan ke gudang penyimpanan ThankSpace
								</li>
								<li>Ketika customer menginginkan barang-barangnya dikirim kembali, customer cukup Sign in ke account mereka secara online dan memilih box mana yang ingin dikembalikan. Tim ThankSpace akan mengantarkan box pada waktu dan tempat yang di jadwalkan.
								</li>
							</ul>

</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop