@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">
		
			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">
				<p>Hallo Admin,</p>
				<p>Ada Customer baru di ThankSpace pada tanggal {{ date('d/m/Y', strtotime($user['updated_at'])) }} dengan informasi sebagai berikut :</p>
				<blockquote>
					<table>
						<tr>
							<td>Nama</td>
							<td>: {{ $user['firstname'] }} {{ $user['lastname'] }}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>: {{ $user['email'] }}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>: {{ $user['address'] }}, {{ $user['city']['name'] }}</td>
						</tr>
						<tr>
							<td>No. Telepon</td>
							<td>: {{ $user['phone'] }}</td>
						</tr>
					</table>
				</blockquote>
			
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>
			
		</td>
	</tr>

@include('emails.footer')