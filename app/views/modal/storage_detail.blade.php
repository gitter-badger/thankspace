@extends('layout.modal')

@section('body')
	
	<?php $no = 1; ?>

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