@extends('layout.default')


@section('content')

	@include('order._board')

	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered">
				<div class="panel panel-default">
					<div data-step="1" data-intro="This is a tooltip!" class="panel-body text-center">
						<h4>Review your order</h4>
						<hr>
						<p> Review your personal and order information to ensure it's accurate, and then click "Checkout"</p>

						<div class="row">
							<div class="col-lg-4">
								<h3>Address</h3>
								<hr>
								<p class="text-left">{{ $user['fullname'] }}<br>
								Phone: {{ $user['phone'] }}<br>
								Address: {{ $user['address'] }}<br>
								City: {{ $user['city']['name'] }}
								</p>
							</div>

							<div class="col-lg-4">
								<h3>Delivery Date</h3>
								<hr>
								<p class="text-left">
									Date: {{ makeFormatTime($review['schedule']['delivery_year'], $review['schedule']['delivery_month'], $review['schedule']['delivery_day']) }}
									<br>
									Time: {{ $review['schedule']['delivery_time'] }}
								</p>
							</div>

							<div class="col-lg-4">
								<h3>Pickup Date</h3>
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
										<!--<tr>
											<th><input type="text" name="coupon" class="form-control" placeholder="Coupon Here"></th>
											<td></td>
											<td style="text-align:left;"><button type="submit" class="btn btn-primary" data-loading-text="Authenticating..." style="width:100%;">
											Reedem
											</button></td>
										</tr>-->
										<tr>
											<th>
											Space Credit
											<span data-toggle="tooltip" data-placement="top" title="Refer Your Friends & Get Paid! Even better, your friends will get paid too!">
											<img width="15px" src="{{ url('assets/img/info.png') }}">
											</span>
											</span>
											<br><b id="space_credit">
												@if(!Session::has('order.space_credit_used'))
												{{ "Rp. ".number_format($space_credit, 0) }},-
												@else
												{{ "Rp. ".number_format($space_credit-Session::get('order.space_credit_used'), 0) }},-
												@endif
											</b></th>
											<input type="hidden" name="space_credit" id="space_credit_in" value="{{ $space_credit }}" />
											<td></td>
											<td style="text-align:left;">
												<button type="button" id="btnSpaceCredit" class="btn btn-primary"
													data-loading-text="saving..."
													data-url="{{ route('order.progress') }}"
													style="width:100%;">
													apply
												</button>
											</td>
										</tr>

										<tr>
											<th>Sub Total</th><td></td>
											<td style="text-align:left;">Rp. {{ number_format(calcPrice('box', $review['index']['quantity_box']) + calcPrice('item', $review['index']['quantity_item'])) }},-</td>
										</tr>
										@if(Session::has('order.space_credit_used'))
										<tr id="rowSpaceCredit">
											<th>Space Credit</th><td></td>
											<td style="text-align:left;">-{{ "Rp. ".number_format(Session::get('order.space_credit_used'), 0) }} </td>
										</tr>
										@endif

										<tr>
											<td colspan="3">
												<h3 id="total">
													{{--*/
														$space_credit_used = 0;
														if(Session::has('order.space_credit_used')){
															$space_credit_used = Session::get('order.space_credit_used');
														}
													/*--}}
													Total:
													Rp. {{ number_format((calcPrice('box', $review['index']['quantity_box']) + calcPrice('item', $review['index']['quantity_item']))-$space_credit_used) }},-
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

						<a class="btn btn-primary" href="{{ route('order.completed') }}" onclick="return confirm('Checkout order ??')">Checkout</a>
						<br>
						or
						<a href="{{ route('order.reset') }}" onclick="return confirm('Reset order ??')">Reset Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
