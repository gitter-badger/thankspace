@extends('layout.modal')

	<!-- Generic page styles -->
	<link rel="stylesheet" href="{{asset('/assets/css/file-upload/style.css')}}">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="{{asset('/assets/css/file-upload/jquery.fileupload.css')}}">

@section('body')

	<span class="btn btn-success fileinput-button">
		<i class="glyphicon glyphicon-plus"></i>
		<span>Add files...</span>
		<!-- The file input field used as target for the file upload widget -->
		<input id="oid" type="hidden" value="{{ $id }}">
		<input id="fileupload" type="file" name="files[]" multiple>
	</span>
	<br>
	<br>
	<!-- The global progress bar -->
	<div id="progress" class="progress">
		<div class="progress-bar progress-bar-success"></div>
	</div>
	<!-- The container for the uploaded files -->
	<div id="files" class="files"></div>

@stop

	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="{{asset('/assets/js/file-upload/vendor/jquery.ui.widget.js')}}"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="{{asset('/assets/js/file-upload/jquery.iframe-transport.js')}}"></script>
	<!-- The basic File Upload plugin -->
	<script src="{{asset('/assets/js/file-upload/jquery.fileupload.js')}}"></script>

<script>
	$(function () {
		'use strict';
		$('#fileupload').fileupload({
			url: 'image',
			dataType: 'json',
			formData: { id : $('#oid').val() },
			done: function (e, data) {
				$.each(data.result.files, function (index, file) {
					// $('<p/>').text(file.name).appendTo('#files');
					$('<img/>').attr('src', file.name).appendTo('#files');
				});
			},
			progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress .progress-bar').css('width', progress + '%');
			}
		})
		.prop('disabled', !$.support.fileInput)
		.parent().addClass($.support.fileInput ? undefined : 'disabled');
	});
</script>