{{--*/ $fullname = ucfirst($firstname) .' '. ucfirst($lastname) /*--}}

@if( $type == 'driver' )
	{{--*/ $utype = 'Delivery Team' /*--}}
@elseif( $type == 'user' )
	{{--*/ $utype = 'Customer' /*--}}
@else
	{{--*/ $utype = 'Admin' /*--}}
@endif

@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">
				<p>Hallo {{ $firstname }},</p>


				<p>Selamat Datang di ThankSpace, reliable storage on-demand di Indonesia.</p>

				@if( $via == 'admin' )
				<p>Anda telah terdaftar sebagai seorang {{ $utype }}, berikut adalah profile anda :</p>
				<p>
					<table>
						<tr>
							<th>Name</th>
							<td>: {{ $fullname }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>: {{ $email }}</td>
						</tr>
						<tr>
							<th>Phone</th>
							<td>: {{ $phone }}</td>
						</tr>
						<tr>
							<th>Address</th>
							<td>: {{ $address }}</td>
						</tr>
						<tr>
							<th>Password</th>
							<td>: {{ $password }}</td>
						</tr>
					</table>
				</p>
				@endif

				@if( !in_array($type, [ 'admin', 'driver']) )
				<p>Terima kasih telah mendaftar dengan kami. Account baru Anda telah aktif dan sekarang Anda dapat menjadwalkan untuk pengiriman dan pengambilan storage box kapan saja di halaman berikut:</p>
				<p><a href="{{ route('order.index') }}" target="_blank">{{ route('order.index') }}</a></p>
				@if(isset($signup_ref) && $signup_ref != null)
				<p>Anda mendapat space credit Rp 50.000 dari pendaftaran via link referral :)</p>
				@endif
				@endif

				<p>Jika Anda memiliki pertanyaan, silahkan hubungi kami di +62313713603 atau dengan membalas email ini.
				Terima kasih telah menggunakan layanan ThankSpace.</p>
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>
		</td>
	</tr>

@include('emails.footer')
