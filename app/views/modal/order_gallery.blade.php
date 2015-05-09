@extends('layout.modal')
	
	<style>
		.img-wrap {
			position: relative;
			display: inline-block;
		}
		.img-wrap .remove {
			position: absolute;
			top: 10px;
			right: 10px;
			color: #fff;
			z-index: 100;
			padding: 5px 2px 2px;
			font-weight: bold;
			cursor: pointer;
			display: none;
			text-align: center;
			font-size: 22px;
			line-height: 10px;
			border-radius: 20%;
			background: #d43f3a;
		}
		.img-wrap:hover .remove {
			opacity: 1;
			display: block;
		}
	</style>

@section('body')
	
	<a class="btn btn-info" data-toggle="modal" href="{{ route('ajax.modalOrderGalleryUpload', $storage['id']) }}" data-target="#ajaxModal2">
		<i class="glyphicon glyphicon-picture"></i> Upload Image(s)
	</a>
	
	<hr>
	
	<p class="afm error-alert text-center"></p>

	@if( count($gallery) > 0 )
	
		@foreach( $gallery as $g )
		
			<div class="img-wrap img-{{ $g['id'] }}">
				<span class="remove" data-filename="{{ $g['filename'] }}" data-id="{{ $g['id'] }}">&times;</span>
				<a href="{{ route('img.show', $g['filename']) }}?size=lightbox" data-lightbox="{{ $storage['order_payment']['code'] }}">
					<img class="img-responsive img-thumbnail" src="{{ route('img.show', $g['filename']) }}?size=medium" style="margin: 5px" />
				</a>
			</div>
		
		@endforeach
	
	@else
	
		<h4 class="error-alert text-center">
			<i class="fa fa-meh-o"></i>	Whoops, there are no image(s) yet
		</h4>
	
	@endif

@stop