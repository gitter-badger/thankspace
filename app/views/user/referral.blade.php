@extends('layout.default')


@section('content')

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
								@if(Session::has('message_success'))
								<span class="success-alert update-profile-scs"><i class="fa fa-smile-o"></i> {{ Session::get('message_success') }}</span>
								@endif
								<p>It's simple. Share your referral code to give your friends {{ 'Rp. '.number_format(Config::get('thankspace.space_credit.signup'),0,'','.') }} Space Credit for first-time signs up. When they order a storage box you get {{ 'Rp. '.number_format(Config::get('thankspace.space_credit.commision'),0,'','.') }} too!</p>
								<div class="form-group">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon">Your referral link: </span>
											<input name="firstname" class="form-control" placeholder="First name" type="text" value="{{ route('page.index',['ref' => Auth::user()->ref_code]) }}" readonly>
										</div>
									</div>
								</div>

								<hr>

									<a href="https://www.facebook.com/sharer/sharer.php?u={{ route('page.index',['ref' => Auth::user()->ref_code]) }}" target="_blank" class="btn-share">
										<img src="http://localhost/thankspace/public/assets/img/social-fb.png" />
									</a>
									<a href="https://twitter.com/share?url={{ route('page.index',['ref' => Auth::user()->ref_code]) }}" target="_blank" class="btn-share">
										<img src="http://localhost/thankspace/public/assets/img/social-tw.png" />
									</a>
									<a href="https://plus.google.com/share?url={{ route('page.index',['ref' => Auth::user()->ref_code]) }}" target="_blank" class="btn-share">
										<img src="http://localhost/thankspace/public/assets/img/social-g+.png" />
									</a>

								<br><br>
								<hr>



								<h3>Credit Account Changes</h3>
								<div class="row">

									<div class="col-lg-4">
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="text-center">
													<h4>Referral:</h4>
													<h2>{{ $customer_join }} Persons</h2>
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
													<h2>{{ "Rp ".number_format($space_credit, 0, '', '.') }}</h2>
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
                  @foreach($space as $s)
                  @if($s->type == 'credit')
									<tr class="success">
										<td>{{ Carbon\Carbon::parse($s->created_at)->format('M d Y') }}</td>
										<td>{{ $s->keterangan }} </td>
										<td>{{ "Rp ".number_format($s->nominal, 0, '', '.') }}</td>
										<td>{{ ucfirst($s->type) }}</td>
									</tr>
                  @else
                  <tr class="danger">
										<td>{{ Carbon\Carbon::parse($s->created_at)->format('M d Y') }}</td>
                    <td>{{ $s->keterangan }} </td>
										<td>{{ "Rp ".number_format(-abs($s->nominal), 0, '', '.') }}</td>
										<td>{{ ucfirst($s->type) }}</td>
									</tr>
                  @endif
                  @endforeach
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

		$('.btn-share').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'Share Window', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        return false;
    });

	</script>
@stop
