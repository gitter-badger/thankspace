<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC_0k5ktLCnbV9RYE7A8BZ8OKbXH38DloM&sensor=false&extension=.js'></script>


{{ Minify::javascript( Config::get('assets.script') ) }}


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