@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">

				<p>Hallo {{ $user_info['firstname'].' '.$user_info['lastname'] }},</p>

				@if ( $expired_on == 0 )
        <p>Masa penyimpanan anda untuk invoice <strong>#{{ $invoice_code }}</strong> berakhir hari ini. Mohon segera lakukan perpanjangan dengan melakukan pembayaran dengan invoice <strong>#{{ $next_invoice }}</strong>.</p>
				@elseif ( $expired_on == 1 )
        <p>Masa penyimpanan anda untuk invoice <strong>#{{ $invoice_code }}</strong> sudah berakhir pada <strong>{{ $expired_date->format('d M Y') }}</strong>. Mohon segera lakukan perpanjangan dengan melakukan pembayaran dengan invoice <strong>#{{ $next_invoice }}</strong>. Anda diberi waktu 3 hari untuk melakukan pembayaran.</p>
        @else
				<p>Masa penyimpanan anda untuk invoice <strong>#{{ $invoice_code }}</strong> akan segera berakhir dalam <strong>{{ abs( $expired_on ) }}</strong> hari. Mohon segera lakukan perpanjangan dengan melakukan pembayaran dengan invoice <strong>#{{ $next_invoice }}</strong>.</p>
				@endif
				<p>Jika anda tidak ingin memperpanjang masa penyimpanan, abaikan saja pesan ini.</p>

				<br />

        <p><b>Jumlah Barang</b></p>
				<table width="100%">
					@foreach ( $stuff as $s )
            <tr>
							<td>
                {{ ucfirst($s['type']) }}
							</td>
							<td>
                {{ $s['jumlah']." (".$s['barang'].") " }}
							</td>
						</tr>
					@endforeach
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

				<br />

				{{--*/
						$total = getTotalFromNewInvoiceObject( $new_invoice, true );
				/*--}}

				@if( $new_invoice->space_credit_used != 0 )
				<p>
					<b>Total Asli : </b>Rp {{ $total->originalTotal }}
				</p>
				<p>
					<b>Space Credit : </b>Rp {{ number_format( $new_invoice->space_credit_used ). ',-' }}
				</p>
				@endif
				<p>
					<b>Total Biaya : </b>Rp {{ $total->totalWithCredit }}
				</p>

				<br />

				<p>Setelah Anda melakukan pembayaran, silahkan melakukan konfirmasi melalui beberapa cara berikut :</p>
				<p>
					<ol>
						<li>
							Halaman Invoice - Konfirmasi Pembayaran
							<br>
							Silahkan masuk ke halaman Customer Area dan masuk halaman Riwayat Invoice, centang pada Invoice yang Anda pilih dan klik tombol Konfirmasi Pembayaran.
						</li>
						<li>
							Silahkan kirimkan SMS ke nomor 085732649156 dengan format : BAYAR < spasi > INV < spasi > #{{ $next_invoice }}  < spasi > Rp. 55.000,00 < spasi > BCA < spasi > Nama Pengirim
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
