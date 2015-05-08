<html>
	<head>
		<style>
			body, table {
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
				font-size: 14px;
				line-height: 1.42857143;
				color: #333;
				text-align: justify;
			}
		</style>
	</head>
	<body>
		<p>Hi {{ Auth::user()->fullname }}</p>
		<p>Kami telah menerima pesanan Anda pada tanggal {{ date('d/m/Y', strtotime($order['updated_at'])) }} dengan informasi detail invoice sebagai berikut :</p>
		<p>
			<b>Alamat Pengiriman</b>
		</p>
		<p>{{ Auth::user()->fullname }}</p>
		<p>Phone : {{ Auth::user()->phone }}</p>
		<p>Address : {{ Auth::user()->address }}</p>
		
		<table width="100%">
			<thead>
				<tr>
					<th>Jadwal Pengantaran</th>
					<th>Jadwal Pengambilan</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						Date : {{ date('l, d m Y', strtotime($order['order_schedule']['delivery_date'])) }}
						<br>
						Time : {{ $order['order_schedule']['delivery_time'] }}
					</td>
					<td>
						@if( $order['order_schedule']['pickup_date'] )
							Date : {{ date('l, d m Y', strtotime($order['order_schedule']['pickup_date'])) }}
							<br>
							Time : {{ $order['order_schedule']['pickup_time'] }}
						@else
							Pada saat itu juga
						@endif
					</td>
				</tr>
			</tbody>
		</table>
		
		<br>
		
		<p>
			<b>Metode Pembayaran</b>
		</p>
		<p>Bank Transfer / ATM / M-Banking / I-Banking</p>
		
		<table width="100%">
			<thead>
				<tr>
					<th>Bank Mandiri</th>
					<th>Bank BNI</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						No. Rekening : 141-00-1127761-3
						<br>
						A / N : Deny Setiawan
					</td>
					<td>
						No. Rekening : 0335301338
						<br>
						A / N : Deny Setiawan
					</td>
				</tr>
			</tbody>
		</table>
		
		<br>
		
		<p>
			<b>Bank BCA</b>
		</p>
		<p>
			No. Rekening : 3890493750
			<br>
			A / N : Deny Setiawan
		</p>
		
		@if( $order['order_payment']['message'] )
		<p>
			<b>Message</b>
		</p>
		<p>{{ $order['order_payment']['message'] }}</p>
		@endif
		
		<p>
			<b>Storage Box(es) : {{ $order['quantity'] }}</b>
		</p>
		
		<p>
			<b>Total Biaya : </b>Rp {{ getTotalTransactions($order['id']) }}
		</p>
		
		<p>Setelah Anda melakukan pembayaran, silahkan melakukan konfirmasi melalui beberapa cara berikut :</p>
		<p>
			<ol>
				<li>
					Halaman Invoice - Konfirmasi Pembayaran
					<br>
					Silahkan masuk ke halaman Customer Area dan masuk halaman Riwayat Invoice, centang pada Invoice yang Anda pilih dan klik tombol Konfirmasi Pembayaran.
				</li>
				<li>
					Silahkan kirimkan SMS ke nomor 085732649156 dengan format : BAYAR < spasi > INV < spasi > #{{ $order['order_payment']['code'] }} < spasi > Rp. 55.000,00 < spasi > BCA < spasi > Nama Pengirim
				</li>
			</ol>
		</p>
		<p>Demikian informasi dari kami mengenai invoice atas layanan yang Anda digunakan.</p>
		<p>Terima kasih telah menggunakan layanan ThankSpace</p>
		<p>-</p>
		<p>Salam,</p>
		<p>Happy Customer Service Officer, ThankSpace</p>
		<p>
			<a href="#">Facebook</a> |
			<a href="#">Twitter</a> |
			<a href="#">LinkedIn</a>
		</p>
	</body>
</html>