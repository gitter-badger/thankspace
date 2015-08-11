@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">
				<p>Hallo Admin,</p>

				<p>Customer <strong>{{ $order['order']['user']['fullname'] }}</strong> telah melakukan konfirmasi pembayaran dengan kode <strong>#{{ $order['code'] }}</strong> pada tanggal <strong>{{ date('d/m/Y', strtotime($order['updated_at'])) }}</strong></p>
				
				<p>Demikian pemberitahuan untuk segera di konfirmasi.</p>
				
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>

		</td>
	</tr>

@include('emails.footer')