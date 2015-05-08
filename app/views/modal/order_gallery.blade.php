@extends('layout.modal')

@section('body')
	
	<a class="btn btn-info" data-toggle="modal" href="{{ route('ajax.modalOrderGalleryUpload', $storage['id']) }}" data-target="#ajaxModal2">
		<i class="glyphicon glyphicon-picture"></i> Upload Image(s)
	</a>
	
	<hr>

	@if( count($gallery) > 0 )
	
		@foreach( $gallery as $g )
			
			<img class="img-responsive img-thumbnail" src="{{ route('img.show', $g['filename']) }}?size=medium" style="margin: 5px" />
			
		@endforeach
	
	@else
	
		<h4 class="error-alert text-center">
			<i class="fa fa-meh-o"></i>	Whoops, there are no image(s) yet
		</h4>
	
	@endif

@stop