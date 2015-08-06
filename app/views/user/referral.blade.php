@extends('layout.default')


@section('content')



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=173043832715243";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>


<script>window.twttr = (function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0],
t = window.twttr || {};
if (d.getElementById(id)) return t;
js = d.createElement(s);
js.id = id;
js.src = "https://platform.twitter.com/widgets.js";
fjs.parentNode.insertBefore(js, fjs);
t._e = [];
t.ready = function(f) {
t._e.push(f);
};
return t;
}(document, "script", "twitter-wjs"));</script>
									
<link rel="canonical" href="http://thankspace.com/?ref=44646464">

	<div class="page-header" id="banner">
		<div class="text-center">
			<h2>Referral Program</h2>
		</div>
	</div>


	<div class="container">
		<div class="row">
			
			<div class="col-lg-3">
				@include('user._side')
			</div>

			<div class="col-lg-9">
					<div class="panel panel-default">
						<div class="panel-body">
							<div >
								<h3>How the referral program works</h3>
								<p>It's simple. Share your referral code to give your friends Rp 50,000 Space Credit for first-time signs up. When they order a storage box you get Rp.50,000 too!</p>

										<div class="form-group">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">
												<div class="input-group">
													<span class="input-group-addon">Your referral link: </span>
													<input name="firstname" class="form-control" placeholder="First name" type="text" value="http://thankspace.com/?ref=44646464">
												</div>
											</div>
										</div>

									<hr>


									<div class="fb-share-button" data-href="http://thankspace.com/?ref=44646464" data-layout="button"></div>
									<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Use my referral link and get $30 off your first storage box order at ThankSpace Storage on Demand. Redeem it at" data-size="large" data-count="none">Tweet</a>
									<br><br>	
									<hr>



								<h3>Credit Account Changes</h3>
								<div class="row">

									<div class="col-lg-4">
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="text-center">
													<h4>Referral:</h4>
													<h2>2 Persons</h2>
													<p>Join this site via your referral link. Thank you!</p>
													</div>
												</div>
											</div>
									</div>
									<div class="col-lg-4">
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="text-center">
													<h4>Current Credit Balance * :</h4>
													<h2>Rp 50,000</h2>
													<!--<p><a href="">Redeem your credit for merchandise >> </a></p>-->
													</div>
												</div>
											</div>
									</div>
									<div class="col-lg-4">
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="text-center">
													<p>* Space Credit is neither exchangeable for cash nor can it be creditted to any account.</p>
													<p>* Space Credit can only be used within ThankSpace website or application</p>
													</div>
												</div>
											</div>
									</div>

								</div>

				<div class="table-responsive">
								
							<table id="sortirtable" class="tablesorter table table-striped table-hover">
								<thead>
									<tr>
										<th>Date</th>
										<th>Description</th>
										<th>Change amount </th>
										<th>Type</th>
									</tr>
								</thead>
								<tbody>
									<tr class="success">
										<td>July 03 2015</td>
										<td>Commision earned for new customer first order </td>
										<td>Rp 50.000,-</td>
										<td>Credit</td>
									</tr>
									<tr class="success">
										<td>May 27 2014</td>
										<td>Commision earned for new customer first order </td>
										<td>Rp 50.000,-</td>
										<td>Credit</td>
									</tr>
									<tr class="danger">
										<td>May 27 2014</td>
										<td>Credit used for purchases order </td>
										<td>- Rp 50.000,-</td>
										<td>Debit</td>
									</tr>
									<tr class="success">
										<td>May 01 2014</td>
										<td>Credit earned for becoming a new member</td>
										<td>Rp 50.000,-</td>
										<td>Credit</td>
									</tr>
									
								</tbody>
							</table>


										
				</div> <!--responsive table-->






							</div>
						</div>
					</div>


					
			</div>

		</div>
	</div>

@stop

@section('foot')
	@parent

	<div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            {{-- Modal Ajax Content --}}
	        </div>
	    </div>
	</div>


	<script type="text/javascript">

		// disable ajax modal cache
		$('#ajaxModal').on('shown.bs.modal', function ()
		{
			$(this).removeData('bs.modal');
		});

	</script>
@stop