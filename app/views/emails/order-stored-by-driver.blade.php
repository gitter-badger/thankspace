@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">

				<p>Hallo {{ $order['user']['firstname'] }},</p>

				<p>Kami ingin memberitahukan bahwa order Anda dengan kode seri <strong>#{{ $order['order_payment']['code'] }}</strong> telah berhasil kami simpan di storage / warehouse.</p>
				<p>Proses penyimpanan terjadi pada :</p>
				<blockquote>
					<table>
						<tr>
							<td>Tanggal</td>
							<td>: {{ date('l, d m Y', strtotime($order['order_schedule']['updated_at'])) }}</td>
						</tr>
						<tr>
							<td>Jam</td>
							<td>: {{ date('H:i a', strtotime($order['order_schedule']['updated_at'])) }}</td>
						</tr>
					</table>
				</blockquote>

				<p>Jika Anda memiliki pertanyaan, silahkan hubungi kami di +62313713603 atau dengan membalas email ini.</p>
				<p>Terima kasih telah menggunakan layanan ThankSpace.</p>
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>

		</td>
	</tr>

@include('emails.footer')