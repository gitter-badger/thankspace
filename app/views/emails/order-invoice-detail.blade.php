@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">

				<p>Hallo {{ Auth::user()->firstname }},</p>

				<p>Kami telah menerima pesanan Anda pada tanggal {{ date('d/m/Y', strtotime($order['updated_at'])) }} dengan informasi detail invoice sebagai berikut :</p>
				<p><b>Alamat Pengiriman</b></p>
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
				
				<p><b>Metode Pembayaran</b></p>
				<p>Bank Transfer / ATM / M-Banking / I-Banking</p>
					
				<table style="border: 0pt solid #b8c8d9;" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td style="border: 0px solid #AAAAAA; color: #444; font-family:Arial;font-weight:normal;font-size:13px;line-height:1.4em; padding: 8px;" width="50%">
								<p><strong>Bank Mandiri</strong><br> a/n.Ari Rundagi Sigit<br> no.REK : 1310-0067-8418-7<br>KCP: Ujung Berung, Bandung</p>
							</td>

							<td style="border: 0px solid #AAAAAA; color: #444; font-family:Arial;font-weight:normal;font-size:13px;line-height:1.4em; padding: 8px;" width="50%">
								<p><strong>Bank BCA</strong><br> a/n.Ari Rundagi Sigit<br> no.REK : 2830-5165-33<br>KCP: Ujung Berung, Bandung</p>
							</td>
						</tr>

						<tr>
							<td style="border: 0px solid #AAAAAA; color: #444; font-family:Arial;font-weight:normal;font-size:13px;line-height:1.4em; padding: 8px;" width="50%">
								<p><strong>Bank BNI</strong><br> a/n.Ari Rundagi Sigit<br> no.REK : 0191-9164-55<br>KCP: Ujung Berung, Bandung</p>
							</td>

							<td style="border: 0px solid #AAAAAA; color: #444; font-family:Arial;font-weight:normal;font-size:13px;line-height:1.4em; padding: 8px;" width="50%">
								<p><strong>Bank BRI</strong><br> a/n.Ari Rundagi Sigit<br> no.REK : 0750-0100-4259-501<br>KCP: Cibiru, Bandung</p>
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

				<p>Jika Anda memiliki pertanyaan, silahkan hubungi kami di +62313713603 atau dengan membalas email ini.
				Terima kasih telah menggunakan layanan ThankSpace.</p>
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
			</div>

		</td>
	</tr>

@include('emails.footer')