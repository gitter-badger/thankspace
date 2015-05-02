@extends('layout.modal')

@section('body')
	
	<?php $no = 1; ?>

	<div>
		@foreach($stuffs['stuffs'] as $stuff)
			<div class="well" style="display: inline-block; margin: 6px; width: 30%;">
				<label>
					{{ $stuff['type'] .' '. $no++ }}
				</label>
				<p>
					{{ $stuff['description'] }}
				</p>
			</div>
		@endforeach
	</div>

@stop