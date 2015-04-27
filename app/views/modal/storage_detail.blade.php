@extends('layout.modal')

@section('body')
	
	<?php 
	$no = 1;
	?>

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
			{{ $storage['order_schedule']['pickup_date']->format('l, jS F Y') }}
			at {{ $storage['order_schedule']['pickup_time'] }}
		</p>
	</div>

	<hr>

	<div>
		<h4>Your Box</h4>
		@foreach(array_chunk($storage['order_stuff']->toArray(), 3) as $row)
			<div class="row">
				@foreach($row as $stuff)
					<div class="col-md-4">
						<div class="well">
							<label>
								{{ $stuff['type'] .' '. $no++ }}
							</label>
							<p>
								{{ $stuff['description'] }}
							</p>
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
	</div>

@stop