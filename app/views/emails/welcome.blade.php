{{--*/ $fullname = ucfirst($firstname) .' '. ucfirst($lastname) /*--}}

@if( $type == 'driver' )
	{{--*/ $utype = 'Delivery Team' /*--}}
@elseif( $type == 'user' )
	{{--*/ $utype = 'Customer' /*--}}
@else
	{{--*/ $utype = 'Admin' /*--}}
@endif
<html>
	<head>
		<style>
			body, table {
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
				font-size: 14px;
				line-height: 1.42857143;
				color: #333;
				text-align: justify;
			}
		</style>
	</head>
	<body>
		<p>Hi {{ $fullname }},</p>
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
		<p>
			Anda dapat menjadwalkan untuk pengiriman dan pengambilan storage box kapan saja di halaman berikut :<br>
			<a href="{{ route('order.index') }}" target="_blank">{{ route('order.index') }}</a>
		</p>
		@endif
		<p>Jika Anda memiliki pertanyaan, silahkan hubungi kami di 031-xxx-xxxx atau dengan membalas email ini.</p>
		<p>Terima kasih telah menggunakan layanan ThankSpace.</p>
		<p>Salam,</p>
		<p>Happy Customer Service Officer, ThankSpace</p>
		<p>
			<a href="#">Facebook</a> |
			<a href="#">Twitter</a> |
			<a href="#">LinkedIn</a>
		</p>
	</body>
</html>