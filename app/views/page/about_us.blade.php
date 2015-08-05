@extends('layout.default')

@section('after_header')
	
@stop

@section('content')
	
	<div class="page-header" id="banner">
		<div class="row text-center">
			<h3>About Us</h3>
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
						<h2 id="navbar">ThankSpace</h2>
						<p>ThankSpace adalah layanan On-demand Storage dimana kami menawarkan sebuah jasa penyimpanan barang yang fleksibel berdasarkan jangka waktu,  ruang dan harga  yang sesuai dengan kebutuhan customer.
						<h2 id="navbar">Storage yang Modern</h2>
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