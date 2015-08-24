@extends('layout.default')

@section('after_header')
<style>
	.table > tbody > tr > td {
		vertical-align: middle;
	}
</style>
@stop

@section('content')

	<div class="page-header" id="banner">
		<div class="row text-center">
			<h3>Hi {{ Auth::user()->firstname }}, Let's make our customer happy! :) always bringing a smile to their faces.</h3>
		</div>
	</div>
	<div class="container">
		<div class="col-lg-12 col-centered">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						@include('admin._stats')
					</div>

					<div class="col-lg-12">
						<hr>
					</div>

					<div class="col-lg-12 text-center">
						<h3>Newest Order</h3>

						<input type="text" id="searchTerm" class="form-control" onkeyup="doSearch()" placeholder="Just type your search term here" />
     					<br /><br />

						@if ( Session::has('message') )
						<p>
							@if ( Session::get('message') == 'success' )
							<span class="success-alert">
								<i class="fa fa-smile-o"></i> Order yang Anda pilih sudah berhasil dikonfirmasi & akan masuk dalam Driver Delivery List.
							</span>
							@else
							<span class="error-alert">
								<i class="fa fa-meh-o"></i> {{ Session::get('message') }}
							</span>
							@endif
						</p>
						@endif

						<!--<div class="table-responsive">-->
						@if( count($invoices) > 0 )

							{{ Form::open([ 'method' => 'POST', 'class' => 'invoice-form-list' ]) }}
							<table id="sortirtable" class="tablesorter table table-striped table-hover text-center">
								<thead>
									<tr>
										<th>Invoice</th>
										<th>Customer</th>
										<th>Delivery Date</th>
										<th>Pickup Date</th>
										<th>Cost</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach( $invoices as $invoice )
									@if( $invoice->is_returned == 1 )
									<tr>
									@elseif( $invoice['order']['order_schedule']['status'] == 1 && $invoice['status'] == 2 )
									<tr class="success">
									@elseif( $invoice['status'] == 1 )
									<tr class="warning">
									@elseif( $invoice['status'] == 2 )
									<tr class="info">
									@else
									<tr class="danger">
									@endif
										<td>
											<a data-toggle="modal" href="{{ route('ajax.modalInvoiceDetail', $invoice['id']) }}" data-target="#ajaxModal">
												#{{ $invoice['code'] }}
											</a>
										</td>
										<td>{{ $invoice['order']['user']['fullname'] }}</td>
										@if ( $invoice['payment_reff'] == null )
										<td>
												{{ $invoice['order']['order_schedule']['delivery_date'] }}
												<br>
												{{ $invoice['order']['order_schedule']['delivery_time'] }}
										</td>
										<td>
												@if( !$invoice['order']['order_schedule']['pickup_date'] )
												At that time
												@else
												{{ $invoice['order']['order_schedule']['delivery_date'] }}
												<br>
												{{ $invoice['order']['order_schedule']['pickup_time'] }}
												@endif
										</td>
										@else
										<td colspan="2">
												Perpanjangan dari Invoice Lama
												<br />
												#{{ $invoice['payment_reff'] }}
										</td>
										@endif
										<td>Rp {{ getTotalTransactions($invoice['id']) }}</td>
										<td>
											@if( $invoice['order']['is_returned'] == 1 )
											<span class="label label-default">Returned</span>
											@elseif( $invoice['order']['order_schedule']['status'] == 1 && $invoice['status'] == 2 )
											<span class="label label-success">Stored</span>
											@elseif( $invoice['status'] == 1 )
											<span class="label label-warning">Waiting Confirmation</span>
											@elseif( $invoice['status'] == 2 )
											<span class="label label-info">Completed Payment</span>
											@else
											<span class="label label-danger">Pending Payment</span>
											@endif
										</td>
										<td>
											@if( $invoice['status'] == 1 )
											<div class="checkbox">
												<label><input name="order_payment_id[]" type="checkbox" value="{{ $invoice['id'] }}" /></label>
											</div>
											@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<table class=" table table-striped table-hover text-center">
								<thead>
								</thead>
								<tbody>
									<tr>
										<td class="text-left" colspan="6">
											{{ $invoices->links() }}
										</td>
										<td class="text-right" colspan="2" style="vertical-align:middle;">
											<div class="btn-group">
												<button type="button" class="btn btn-primary">Action</button>
												<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
													<span class="caret"></span>
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" class="konfirmPayment">Confirming this payment</a></li>
												</ul>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							{{ Form::close() }}
							<input type="hidden" class="konfirmRoute" value="{{ route('user.confirm_payment') }}" />

						@else

							<div class="alert alert-info">Whoops, there are no transactions yet!</div>

						@endif
						<!--</div>-->
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
