@extends('layout.modal')

@section('body')

	{{ Form::open(['method' => 'PUT', 'url' => route('user.storageUpdate', $storage['id'])]) }}
		
		<?php 
		$i = 0;
		$no = 1;
		?>
		@foreach($stuffs as $stuff)
			@if(! $stuff['return_schedule_id'])
				<label>
					{{ $stuff['type'] .' '. $no++ }}
				</label>
				{{ Form::hidden("stuff[$i][id]", $stuff['id']) }}
				{{ Form::hidden("stuff[$i][type]", $stuff['type']) }}
				{{ Form::textarea("stuff[$i][description]", $stuff['description'], ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Write your stuff in this '. $stuff['type'], 'required' => true]) }}
				<?php 
				$i++;
				?>
			@endif
		@endforeach

		<hr>
		<div class="text-center">
			<button type="submit" class="btn btn-primary">Save changes</button>
		</div>

	{{ Form::close() }}

@stop