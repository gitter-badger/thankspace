<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC_0k5ktLCnbV9RYE7A8BZ8OKbXH38DloM&sensor=false&extension=.js'></script>

{{-- javascript ori from github
{{ Minify::javascript( Config::get('assets.script') ) }} --}}

{{--*/
$javaScript = Config::get('assets.script');
/*--}}

@foreach($javaScript as $js)
{{ HTML::script($js) }}
@endforeach


	<script type="text/javascript">
	$(function() {
		$("#sortirtable").tablesorter();
	});
	</script>

@if(Input::get('modal') == 'sign-in-modal')
	
	<script type="text/javascript">
		$('#sign-in-modal').modal('show');
	</script>
	
@endif

@if(Input::has('ref'))

<script type="text/javascript">

	var code = {{ Input::get('ref') }};
	$.ajax({
		type : "GET",
		url  : "{{ route('user.referral_check', Input::get('ref')) }}",
		success : function(result) {
			if ( result['status'] == 200 ) {
				$('<input>').attr({
					type: 'hidden',
					id: 'signup_ref',
					name: 'signup_ref',
					value : code
				}).appendTo('#sign-up-form');
				$("#head_signup").html(result['message']);
				$('#sign-up-modal').modal('show');
			}
		}
	});

</script>

@endif