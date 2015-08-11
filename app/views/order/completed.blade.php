@extends('layout.default')


@section('content')

	@include('order._board')

	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered">
				<div class="panel panel-default">
					<div data-step="1" data-intro="This is a tooltip!" class="panel-body ">
						<center>
							<h4>Terima Kasih!</h4>
							<hr>
							<p>Terima kasih sudah melakukan pemesanan untuk penyimpanan Storage Box atau Barang 
							Oversized Anda.<br><br>Langkah selanjutnya adalah melakukan pembayaran sesuai dengan metode pembayaran yang
							telah Anda pilih. Masuk ke Akun Anda - Lihat Invoice.</p>

							<center><a class="btn btn-primary" href="{{ route('user.invoice') }}">Lihat Invoice</a></center>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop

@section('foot')
	@parent

	<script>

		function codeAddress() {
			swal({
				title: "Thanks!",
				text: "Terima kasih sudah menggunakan layanan ThankSpace.",
				imageUrl: "{{ url('assets/img/order-completed.png') }}"
			});
		}
		window.onload = codeAddress;
	</script>
@stop