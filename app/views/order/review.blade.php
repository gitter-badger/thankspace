@extends('layout.default')


@section('content')

	@include('order._board')

	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered">
				<div class="panel panel-default">
					<div data-step="1" data-intro="This is a tooltip!" class="panel-body text-center">
						<h4>Review Pesanan Anda</h4>
						<hr>
						<p>Anda bisa me-review kembali rincian pesanan yang telah anda lakukan. 
						Apabila tidak ada perubahan pilih "Checkout"</p>

						<div class="row">
							<div class="col-lg-4">
								<h3>Address</h3>
								<hr>
								<p class="text-left">{{ $user['fullname'] }}<br>
								Phone: {{ $user['phone'] }}<br>
								Address: {{ $user['address'] }}</p>
							</div>

							<div class="col-lg-4">
								<h3>Jadwal Pengantaran</h3>
								<hr>
								<p class="text-left">
									Date: {{ makeFormatTime($review['schedule']['delivery_year'], $review['schedule']['delivery_month'], $review['schedule']['delivery_day']) }}
									<br>
									Time: {{ $review['schedule']['delivery_time'] }}
								</p>
							</div>

							<div class="col-lg-4">
								<h3>Jadwal Pengambilan</h3>
								<hr>
								<p class="text-left">
									@if($review['schedule']['type'] == 'later')
										<p class="text-left">
											Date: {{ makeFormatTime($review['schedule']['pickup_year'], $review['schedule']['pickup_month'], $review['schedule']['pickup_day']) }}
											<br>
											Time: {{ $review['schedule']['pickup_time'] }}
										</p>
									@else
										{{ $review['schedule']['type'] }}
									@endif
								</p>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<h3>Comment</h3>
								<hr>
								<p class="text-left">
									{{ $review['payment']['message'] }}
								</p>
							</div>

							<div class="col-lg-4">
								<h3>Details</h3>
								<hr>

								<table class="table">
									<tbody>
										<tr>
											<th>Storage Box</th>
											<td>{{ $review['index']['quantity_box'] }}</td>
											<td style="text-align:left;">{{ calcPrice('box', $review['index']['quantity_box'], true) }}</td>
										</tr>
										<tr>
											<th>Item</th>
											<td>{{ $review['index']['quantity_item'] }}</td>
											<td style="text-align:left;">{{ calcPrice('item', $review['index']['quantity_item'], true) }}</td>
										</tr>
										<tr>
											<td colspan="3">
												<h3>
													Total:
													Rp. {{ number_format(calcPrice('box', $review['index']['quantity_box']) + calcPrice('item', $review['index']['quantity_item'])) }},-
												</h3>
											</td>
										</tr>
									</tbody>
								</table>

								{{-- <div class="col-lg-5 text-left">
									Storage box: <br>
									item:
								</div>
								<div class="col-lg-2 text-left">
									{{ $review['index']['quantity_box'] }}<br>
									{{ $review['index']['quantity_item'] }}
								</div>
								<div class="col-lg-5 text-left">
									{{ calcPrice('box', $review['index']['quantity_box'], true) }}
									<br>
									{{ calcPrice('item', $review['index']['quantity_item'], true) }}
								</div>

								<br><br>
								<h3>Total: 

								</h3> --}}
							</div>

							<div class="col-lg-4">
								<h3>Billing</h3>
								<hr>
								<p class="text-left">Payment Method: {{ $review['payment']['method'] }}</p>
							</div>
						</div>
						<!-- end row -->

						<a class="btn btn-primary" href="{{ route('order.completed') }}">Checkout</a>
						<br>
						atau
						<a href="{{ route('order.reset') }}">Reset Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop