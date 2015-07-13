<style>
body,td { font-family: verdana; font-size: 11px; font-weight: normal; }
a { color: #0000ff;}
table.email td { text-align: left;}
</style>

<div style="background-color:#E5EDF0;text-align:center">
<table width="600" cellspacing="0" cellpadding="20" border="0" style="margin:10px auto 30px;text-align:left">
<tbody>

<tr>
<td style="background-image: url('http://rajanya.com/templates/Rajanya/html/images/header_bg.png');background-position: top center;background-color: #3F51B5; background-repeat: no-repeat;padding:20px;text-align:center">
<img border="0" alt="ThankSpace" src="http://thankspace.com/assets/img/logo-nav.png"></span>
</td>
</tr>

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
		
		<br>
	
		<p>Demikian pemberitahuan untuk segera di konfirmasi.</p>
<p>Salam,</p>
<p>
Happy Customer Service Officer, ThankSpace</p><br>
</div>

<!--kupon
<table style="background: #ffffff; text-align: center; font-family: Arial, sans-serif;" cellpadding="0" cellspacing="0" width="100%">

<tr>
<td style="padding: 10px 30px 20px 42px;" valign="top">

<div style="width:256px; padding:9px; background:url(http://static.4shared.com/images/email/scissors-bg.png) no-repeat 10px 0; margin:0 auto;">

<div style="width:254px; padding: 20px 0 10px; border:1px dashed #97a5b1; border-radius:12px;">

<div style="font-size: 12px; text-transform: uppercase; color:#444;">
<b style="font-size: 15px;">Kode Diskon Khusus</b>
<br/> pada akun premium Rajanya.com</div>

<div style="color: #ffffff; font-weight: bold; font-size: 16px; padding: 10px 0; width:195px; background-color: #6f7b87; margin: 10px auto;">ECHO1N9</div>

<div style="color: #444; font-size: 11px; padding-bottom: 10px;">* Gunakan kode promo saat akan membayar</div>

</div></div>
</td></tr>
</table>
kupon-->

</td>
</tr>

<tr>
<td align="center" style="font-size:13px;background-color:#d3d3d3;color:#444444;font-style:normal;font-weight:normal;font-family:Helvetica;line-height:1.4em;padding:0;vertical-align:top">
<table width="560" cellspacing="0" cellpadding="0" border="0" style="padding-bottom:0px">
<tbody>
<tr>

<td valign="top" align="left" style="font-size:11px;line-height:1.4em;color:#444;width:25%;padding-right:20px;padding-left:0;padding-top:20px;border-right:1px solid #baa17b">
<h2 style="font-size:18px;font-weight:normal;color:#333333;font-style:normal;font-family:Arial;text-align:left;margin-bottom:15px">Butuh bantuan?</h2>
<p>Hubungi kami di +62313713603 atau email support@thankspace.com</p>
<p><b>Office Hours:</b><br>
09:00-17:00, Senin-Jumat, kecuali hari libur resmi.</p> 
<p><b>Delivery Time: </b><br>
9:00-21:00, Senin-Minggu, kecuali hari libur resmi. </p>
<p><a title="Twitter" href="http://twitter.com/Thankspace"><img width="20" alt="" src="https://c338648.ssl.cf1.rackcdn.com/wp-content/themes/30072012/images/twitter.png"></a>&nbsp;<a title="Facebook" href="https://www.facebook.com/Thankspace"><img width="20" alt="" src="https://c338648.ssl.cf1.rackcdn.com/wp-content/themes/30072012/images/facebook.png"></a></p>
</td>

<td valign="top" align="left" style="font-size:11px;line-height:1.4em;color:#444;width:28%;padding-right:20px;padding-left:20px;padding-top:20px;border-right:1px solid #baa17b">
		<h2 style="font-size:18px;font-weight:normal;color:#333333;font-style:normal;font-family:Arial;text-align:left;margin-bottom:15px">Afiliasi Program</h2>
		<p>Ajak rekan, keluarga atau siapapun untuk menggunakan layanan kami & dapatkan komisi 30% dari total order yang didapatkan dalam satu bulan. <a title="ThankSpace" href="http://www.thankspace.com/page/affiliate">Lihat infonya...</a></p>
		<p>&nbsp;</p>
</td>

<td valign="top" align="left" style="font-size:11px;line-height:1.4em;color:#444;width:28%;padding-right:15px;padding-left:20px;padding-top:20px;border-right:1px solid #baa17b;margin-right:15px;border:0">
		<h2 style="font-size:18px;font-weight:normal;color:#333333;font-style:normal;font-family:Arial;text-align:left;margin-bottom:15px">Office kami</h2>
<p><b>ThankSpace Surabaya</b><br>
Jl. Panggung No.18, Pabean Cantian, Surabaya, Jawa Timur. 60162</p>
<p><b>ThankSpace Denpasar</b><br>
Jl. Mahendradatta Selatan 7A, Denpasar, Bali, 80361 </p>
</td>

</tr>
</tbody>
</table>
</td>
</tr>

<tr>
<td style="background-color:#696969;padding:20px;font-size:10px;color:#ffffff;line-height:100%;font-family:Verdana;text-align:center">
<p>Copyright (C) 2015 ThankSpace. All rights reserved.</p>
<p>ThankSpace.com</p>
</td>
</tr>

<tr>
<td valign="middle" align="center" style="text-align:center;font-size:10px;padding:10px 0 20px;color:#eee;margin:0;font-family:Verdana">
<!--space-->
</td>
</tr>

</tbody>
</table>
</div>