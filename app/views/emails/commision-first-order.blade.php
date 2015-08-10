@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">
				<p>Hallo {{ $name }},</p>
				<p>Anda mendapat komisi order pertama sebesar {{ 'Rp. '.number_format($commision,0,'','.') }} dari salah customer yang mendaftar menggunakan link referral anda.</p>

				<p>Demikian pemberitahuan kami.</p>
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>

		</td>
	</tr>

@include('emails.footer')
