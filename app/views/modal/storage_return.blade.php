@extends('layout.modal')

@section('body')
	
	{{ Form::open(['method' => 'POST', 'url' => route('user.storageReturnProcess', $storage['id']), 'class' => 'form-horizontal return-process-form']) }}
		<span class="error-alert return-process-err text-center"></span>
		{{ Form::hidden('order_id', $storage['id']) }}

		<h4>1. Schedule</h4>
		<div class="form-group">
			<label class="col-md-3">Return Date</label>
			<div class="col-md-9">
				<input type="date" name="return_date" value="" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Return Time</label>
			<div class="col-md-9">
				{{ Form::select('return_time', Config::get('thankspace.office_hours'), null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Other Address</label>
			<div class="col-md-9">
				<input type="text" name="other_address" value="" class="form-control" placeholder="This is optional">
			</div>
		</div>

		<hr />

		<h4>2. Stuffs</h4>

		<?php $i = 1 ?>
		@foreach( $storage->order_stuff as $stuff )
			@if( $stuff->description AND ! $stuff['return_schedule_id'])
				<div class="row">
					<div class="col-md-10">
						<div class="well">
							<h4 style="margin: 3px 0px;">
								{{ ucfirst($stuff->type) }} {{ $i++ }} : {{ $stuff->description }}
							</h4>
						</div>
					</div>
					<div class="col-md-2">
						{{ Form::checkbox('stuffs[]', $stuff['id'], false, ['class' => 'form-control']) }}
					</div>
				</div>
			@endif
		@endforeach

		<div class="form-group text-center">
			<button type="submit" class="btn btn-primary return-process" data-loading-text="Processing...">
				Kembalikan
			</button>
		</div>

	{{ Form::close() }}
	
@stop