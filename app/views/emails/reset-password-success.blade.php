@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">
				<p>Hallo {{ $user['firstname'] }},</p>

				<p>Anda telah berhasil mengubah password Anda</p>
				<p>Jika Anda menerima email ini tetapi tidak mengubah password Anda, silahkan hubungi kami di +62313713603 atau dengan membalas email ini.</p>
				<p>Terima kasih telah menggunakan layanan ThankSpace.</p>
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>

		</td>
	</tr>

@include('emails.footer')