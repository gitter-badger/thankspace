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

	
	<p>
		Hello, {{ $return['order']['user']['firstname'] }}
	</p>

	<p>
		{{ Input::get('message') }}
	</p>

	<p>Demikian informasi dari kami mengenai invoice atas layanan yang Anda digunakan.</p>
	<p>Terima kasih telah menggunakan layanan ThankSpace</p>
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