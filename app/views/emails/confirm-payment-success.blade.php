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
		<p>Pembayaran untuk invoice #{{ $code }} sudah kami terima pada tanggal {{ $date }}</p>
		<p>
			Anda dapat juga mengeceknya melalui halaman customer pada bagian Riwayat Invoice.<br>
			<a href="{{ route('user.invoice') }}" target="_blank">{{ route('user.invoice') }}</a>
		</p>
		<p>Demikian informasi dari kami mengenai pembayaran Anda.</p>
		<p>Terima kasih atas kepercayaan Anda menggunakan layanan ThankSpace.</p>
		<p>Note: E-mail ini adalah tanda terima pembayaran resmi dari ThankSpace</p>
		<p>-</p>
		<p>Salam,</p>
		<p>Happy Customer Service Officer, ThankSpace</p>
		<p>
			<a href="#">Facebook</a> |
			<a href="#">Twitter</a> |
			<a href="#">LinkedIn</a>
		</p>
	</body>
</html>