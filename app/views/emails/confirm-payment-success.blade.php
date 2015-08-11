@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">
				<p>Hallo {{ $user['firstname'] }},</p>

				<p>Pembayaran untuk invoice #{{ $code }} sudah kami terima pada tanggal {{ $date }}</p>
				<p>
					Anda dapat juga mengeceknya melalui halaman customer pada bagian Riwayat Invoice.<br>
					<a href="{{ route('user.invoice') }}" target="_blank">{{ route('user.invoice') }}</a>
				</p>
				<p>Demikian informasi dari kami mengenai pembayaran Anda.</p>
				<p>Terima kasih atas kepercayaan Anda menggunakan layanan ThankSpace.</p>
				<p>Note: E-mail ini adalah tanda terima pembayaran resmi dari ThankSpace</p>
						
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>

		</td>
	</tr>

@include('emails.footer')