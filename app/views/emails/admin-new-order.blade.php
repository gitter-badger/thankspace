@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">
		
			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">
				<p>Hallo Admin,</p>
				<p>Ada Order baru di ThankSpace pada tanggal {{ date('d/m/Y', strtotime($order['updated_at'])) }} dengan informasi detail order sebagai berikut :</p>
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
			
				<p>Demikian pemberitahuan untuk segera di konfirmasi.</p>
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>
			
		</td>
	</tr>

@include('emails.footer')