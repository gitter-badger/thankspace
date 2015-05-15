@extends('layout.modal')

@section('body')
	
	<h5>Details</h5>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th>Other Address</th>
				<td>{{ $return['other_address'] }}</td>
			</tr>
			<tr>
				<th>Return Time</th>
				<td>
					<div>{{ makeFormatTime($return['return_date']) }}</div>
					<small>{{ $return['return_time'] }}</small>
				</td>
			</tr>
			<tr>
				<th>Stuff</th>
				<td valign="top">
					@if($return['stuffs'])
						@foreach($return['stuffs'] as $stuff)
							<li>{{ $stuff['description'] }}</li>
						@endforeach
					@endif
				</td>
			</tr>
		</tbody>
	</table>

	<hr>

	{{ Form::open(['url' => route('admin.postReturnRequest', $return['id']), 'method' => 'POST']) }}
		<p>
			<label>Message : </label>
			{{ Form::textarea('message', null, ['class' => 'form-control']) }}
		</p>
		<p>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-send"></i>
				Confirm &amp; Send
			</button>
		</p>
	{{ Form::close() }}

@stop