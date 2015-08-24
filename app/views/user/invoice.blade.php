@extends('layout.default')


@section('content')

	<div class="page-header" id="banner">
		<div class="text-center">
			<h3>“Success” is being able to pay the invoices/bills ;-)</h3>
		</div>
	</div>


	<div class="container">
		<div class="row">

			<div class="col-lg-3">
				@include('user._side')
			</div>

			<div class="col-lg-9">
				@if( count($invoices) > 0 )

					<div class="panel panel-default text-center">
						<div class="panel-body">

							<h3>You can read your invoice details here</h3>

							@if ( Session::has('message') )
							<p>
								@if ( Session::get('message') == 'success' )

								<script>

								function codeAddress() {
									swal({
										title: "Thanks!",
										text: " Thank you for your payment confirmation. Our Happy Customer Service officer will conduct the verification process and you will receive a confirmation e-mail.",
										imageUrl: "{{ url('assets/img/order-completed.png') }}"
										});
									}
									window.onload = codeAddress;
								</script>

								<span class="success-alert">
									<i class="fa fa-smile-o"></i> Hi {{ Auth::user()->fullname }}. Thank you for your payment confirmation. Our Happy Customer Service officer will conduct the verification process and you will receive a confirmation e-mail.
								</span>
								@else
								<span class="error-alert">
									<i class="fa fa-meh-o"></i> {{ Session::get('message') }}
								</span>
								@endif
							</p>
							@endif


				<div class="table-responsive">

							{{ Form::open([ 'method' => 'POST', 'class' => 'invoice-form-list' ]) }}
							<table id="sortirtable" class="tablesorter table table-striped table-hover">
								<thead>
									<tr>
										<th>Invoice</th>
										<!--<th>Delivery Date </th>
										<th>Pickup Date</th>-->
										<th>Storage Period</th>
										<th>Cost</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach( $invoices as $invoice )
									@if( $invoice['status'] == 2 )
									<tr class="success">
									@elseif( $invoice['status'] == 1 )
									<tr class="info">
									@else
									<tr class="danger">
									@endif
										<td>
											<a data-toggle="modal" href="{{ route('ajax.modalInvoiceDetail', $invoice['id']) }}" data-target="#ajaxModal">
												#{{ $invoice['code'] }}
											</a>
										</td>
										<!--<td>
											{{ $invoice['order']['order_schedule']['delivery_date'] }}
											<br>
											{{ $invoice['order']['order_schedule']['delivery_time'] }}
										</td>
										<td>
											@if( !$invoice['order']['order_schedule']['pickup_date'] )
											Immediately
											@else
											{{ $invoice['order']['order_schedule']['delivery_date'] }}
											<br>
											{{ $invoice['order']['order_schedule']['pickup_time'] }}
											@endif
										</td>-->
										<td>
											{{--*/
													$date_invoice_used = '';
													if ( $invoice['used_start'] == null ) {
														if ( $invoice['order']['order_schedule']['pickup_date'] == null ){
															$date_invoice_used = \Carbon\Carbon::parse( $invoice['order']['order_schedule']['delivery_date'] );
														} else {
															$date_invoice_used = \Carbon\Carbon::parse( $invoice['order']['order_schedule']['pickup_date'] );
														}
													} else {
														$date_invoice_used = \Carbon\Carbon::parse( $invoice['used_start'] );
													}
											/*--}}
											{{ $date_invoice_used->format('d M Y').' - '.$date_invoice_used->addDays(31)->format('d M Y') }}
										</td>
										<td>Rp {{ getTotalTransactions($invoice['id']) }}</td>
										<td>
											@if( $invoice['status'] == 2 )
											<span class="label label-success">Completed Payment</span>
											@elseif( $invoice['status'] == 1 )
											<span class="label label-info">Waiting Confirmation</span>
											@else
											<span class="label label-danger">Pending Payment</span>
											@endif
										</td>
										<td>
											@if( $invoice['status'] == 0 )
											<div class="checkbox">
												<label><input name="order_payment_id[]" type="checkbox" value="{{ $invoice['id'] }}" /></label>
											</div>
											@endif
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-left" colspan="4">
											{{ $invoices->links() }}
										</td>
										<td class="text-right" colspan="3" style="vertical-align:middle;">
											<div class="btn-group">
												<button type="button" class="btn btn-primary">Action</button>
												<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
													<span class="caret"></span>
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" class="konfirmPayment">Confirming my payment</a></li>
												</ul>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							{{ Form::close() }}
							<input type="hidden" class="konfirmRoute" value="{{ route('user.confirm_payment') }}" />
						</div>
					</div>

				@else
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="text-center">
								<h3>Anda belum mempunyai riwayat tagihan saat ini .</h3>
								<p>Pesan storage box sesuai dengan kebutuhan Anda sekarang.</p>
								<p>
									<a class="btn btn-primary" href="{{ route('order.index') }}">Order Now!</a>
								</p>
							</div>
						</div>
					</div>
				@endif

				</div> <!--responsive table-->

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
