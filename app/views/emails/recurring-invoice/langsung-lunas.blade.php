@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">

				<p>Hallo {{ $user_info['firstname'].' '.$user_info['lastname'] }},</p>

				<p>Masa penyimpanan anda untuk invoice <strong>#{{ $invoice_code }}</strong> akan segera berakhir dalam <strong>{{ abs( $expired_on ) }}</strong> hari. Anda mempunyai space credit yang cukup untuk biaya perpanjangan, maka kami lakukan perpanjangan dengan memotong space credit anda. invoice perpanjangan anda adalah <strong>#{{ $next_invoice }}</strong>.</p>

				<br />

				<p><b>Jumlah Barang</b></p>
				<table width="100%">
					@foreach ( $stuff as $s )
            <tr>
							<td>
                {{ ucfirst($s['type']) }}
							</td>
							<td>
                {{ $s['jumlah']." (".$s['barang'].") " }}
							</td>
						</tr>
					@endforeach
				</table>

				<br>

				{{--*/
						$total = getTotalFromNewInvoiceObject( $new_invoice, true );
				/*--}}

				@if( $new_invoice->space_credit_used != 0 )
				<p>
					<b>Total Asli : </b>Rp {{ $total->originalTotal }}
				</p>
				<p>
					<b>Space Credit : </b>Rp {{ number_format( $new_invoice->space_credit_used ). ',-' }}
				</p>
				@endif
				<p>
					<b>Total Biaya : </b>Rp {{ $total->totalWithCredit }}
				</p>

				<br />

				<p>Demikian informasi dari kami mengenai invoice atas layanan yang Anda digunakan.</p>

				<p>Jika Anda memiliki pertanyaan, silahkan hubungi kami di +62313713603 atau dengan membalas email ini.
				Terima kasih telah menggunakan layanan ThankSpace.</p>
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
			</div>

		</td>
	</tr>

@include('emails.footer')
