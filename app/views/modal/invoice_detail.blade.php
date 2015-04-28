@extends('layout.modal')

@section('body')

	<p>
		<b>Alamat Pengiriman</b>
	</p>
	<p>{{ $invoice->user->fullname }}</p>
	<p>Phone : {{ $invoice->user->phone }}</p>
	<p>Address : {{ $invoice->user->address }}</p>
	
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
					Date : {{ date('l, d m Y', strtotime($invoice->order_schedule->delivery_date)) }}
					<br>
					Time : {{ $invoice->order_schedule->delivery_time }}
				</td>
				<td>
					@if( $invoice->order_schedule->pickup_date )
						Date : {{ date('l, d m Y', strtotime($invoice->order_schedule->pickup_date)) }}
						<br>
						Time : {{ $invoice->order_schedule->pickup_time }}
					@else
						Pada saat itu juga
					@endif
				</td>
			</tr>
		</tbody>
	</table>
	
	<br>
	
	<p>
		<b>Metode Pembayaran</b>
	</p>
	<p>Bank Transfer / ATM / M-Banking / I-Banking</p>
	
	<table width="100%">
		<thead>
			<tr>
				<th>Bank Mandiri</th>
				<th>Bank BNI</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					No. Rekening : 141-00-1127761-3
					<br>
					A / N : Deny Setiawan
				</td>
				<td>
					No. Rekening : 0335301338
					<br>
					A / N : Deny Setiawan
				</td>
			</tr>
		</tbody>
	</table>
	
	<br>
	
	<p>
		<b>Bank BCA</b>
	</p>
	<p>
		No. Rekening : 3890493750
		<br>
		A / N : Deny Setiawan
	</p>
	
	@if( $invoice->order_payment->message )
	<p>
		<b>Message</b>
	</p>
	<p>{{ $invoice->order_payment->message }}</p>
	@endif
	
	<p>
		<b>Detail Barang</b>
	</p>
	<p>
		<a data-toggle="modal" href="{{ route('ajax.modalStorageDetail', $invoice->id) }}" data-target="#ajaxModal">
			Click here to view
		</a>
	</p>
	
	<p>
		<b>Total Biaya : </b>Rp {{ getTotalTransactions($invoice->id) }}
	</p>
	
	@if( Auth::user()->type == 'user' )
	<p>Setelah Anda melakukan pembayaran, silahkan melakukan konfirmasi melalui beberapa cara berikut :</p>
	<p>
		<ol>
			<li>
				Halaman Invoice - Konfirmasi Pembayaran
				<br>
				Silahkan masuk ke halaman Customer Area dan masuk halaman Riwayat Invoice, centang pada Invoice yang Anda pilih dan klik tombol Konfirmasi Pembayaran.
			</li>
			<li>
				Silahkan kirimkan SMS ke nomor 085732649156 dengan format : BAYAR < spasi > INV < spasi > #{{ $invoice->order_payment->code }} < spasi > Rp. 55.000,00 < spasi > BCA < spasi > Nama Pengirim
			</li>
		</ol>
	</p>
	@endif

@stop