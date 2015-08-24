@extends('layout.modal')

@section('body')

	<?php $no = 1; ?>

	@if ( !empty( $storage['order_payment']['payment_reff'] ) )
	<div>
		<h4>Perpanjangan dari invoice #{{ $storage['order_payment']['payment_reff'] }}</h4>

		@if ( getTotalTransactions( $storage['order_payment']['id'], false, false ) >= 1000 )
		<p>
			<label>Payment Method : </label>
			{{ $storage['order_payment']['method'] }}
		</p>
		@endif

		@if ( $storage['order_payment']['space_credit_used'] != 0 )
		<p>
			Space Credit = Rp. {{ number_format( $storage['order_payment']['space_credit_used'] ).'-' }}
		</p>
		@endif

	</div>
	@else
	<div>
		<h4>Order Payment</h4>
		<p>
			<label>Payment Method : </label>
			{{ $storage['order_payment']['method'] }}
		</p>
		<p>
			<label>Your Message : </label>
			{{ $storage['order_payment']['message'] }}
		</p>
	</div>

	<hr>

	<div>
		<h4>Order Schedule</h4>
		<p>
			<label>Delivery Date : </label>
			{{ $storage['order_schedule']['delivery_date']->format('l, jS F Y') }}
			at {{ $storage['order_schedule']['delivery_time'] }}
		</p>
		<p>
			<label>Pickup Date : </label>
			@if( ! empty($storage['order_schedule']['pickup_date']) )
				{{ $storage['order_schedule']['pickup_date']->format('l, jS F Y') }}
				at {{ $storage['order_schedule']['pickup_time'] }}
			@else
				immediately
			@endif
		</p>
	</div>
	@endif

	<hr>

	<div>
		<h4>Your Box</h4>
		@foreach($storage['order_stuff'] as $stuff)
			@if(! $stuff['return_schedule_id'] || $storage['is_returned'] == 1)
				<div class="well" style="display: inline-block; margin: 6px; width: 30%;">
					<label>
						{{ $stuff['type'] .' '. $no++ }}
					</label>
					<p>
						{{ $stuff['description'] }}
					</p>
				</div>
			@endif
		@endforeach
	</div>

@stop
