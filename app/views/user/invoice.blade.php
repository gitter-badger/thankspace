@extends('layout.default')


@section('content')

	<div class="page-header" id="banner">
		<div class="text-center">
			<h3>Riwayat Invoice</h3>
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

							<h3>Riwayat Order Terbaru</h3>
							
							@if ( Session::has('message') )
							<p>
								@if ( Session::get('message') == 'success' )
								<span class="success-alert">
									<i class="fa fa-smile-o"></i> Konfirmasi pembayaran sudah dilakukan. Tim Customer Service kami akan melakukan proses verifikasi dan akan memberikan informasi terbaru kepada Anda.
								</span>
								@else
								<span class="error-alert">
									<i class="fa fa-meh-o"></i> {{ Session::get('message') }}
								</span>
								@endif
							</p>
							@endif
							
							{{ Form::open([ 'method' => 'POST', 'class' => 'invoice-form-list' ]) }}
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Invoice Code</th>
										<th>Box Yang dibutuhkan</th>
										<th>Barang Lain</th>
										<th>Jadwal Box Diantar</th>
										<th>Jadwal Box Diambil</th>
										<th>Biaya</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach( $invoices as $invoice )
									@if( $invoice->order_payment->status == 2 )
									<tr class="success">
									@elseif( $invoice->order_payment->status == 1 )
									<tr class="info">
									@else
									<tr class="danger">
									@endif
										<td>
											<a data-toggle="modal" href="{{ route('ajax.modalInvoiceDetail', $invoice->id) }}" data-target="#ajaxModal">
												#{{ $invoice->order_payment->code }}
											</a>
										</td>
										<td>{{ $invoice->quantity }}</td>
										<td>{{ $invoice->description ? : 'Tidak Ada' }}</td>
										<td>{{ $invoice->order_schedule->delivery_date }}</td>
										<td>
											@if( !$invoice->order_schedule->pickup_date )
											{{ $invoice->order_schedule->delivery_date }}
											@else
											{{ $invoice->order_schedule->pickup_date }}
											@endif
										</td>
										<td>
											@if( $invoice->type == 'item' )
											{{ $invoice->quantity * 150000 }}
											@else
											{{ $invoice->quantity * 50000 }}
											@endif
										</td>
										<td>
											@if( $invoice->order_payment->status == 2 )
											<span class="label label-success">Completed Payment</span>
											@elseif( $invoice->order_payment->status == 1 )
											<span class="label label-info">Waiting Confirmation</span>
											@else
											<span class="label label-danger">Pending Payment</span>
											@endif
										</td>
										<td>
											@if( $invoice->order_payment->status == 0 )
											<div class="checkbox">
												<label><input name="order_payment_id[]" type="checkbox" value="{{ $invoice->order_payment->id }}" /></label>
											</div>
											@endif
										</td>
									</tr>
									@endforeach
									<tr>
										<td class="text-left" colspan="5">
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
													<li><a href="#" class="konfirmPayment">Konfirmasi pembayaran</a></li>
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
								<h3>Saat ini Anda belum menyimpan sesuatu pada tempat penyimpanan / <i>Warehouse</i> kami.</h3>
								<p>Pesan storage box sesuai dengan kebutuhan Anda</p>
								<p>
									<a class="btn btn-primary" href="{{ route('order.index') }}">Order Storage Box</a>
								</p>
							</div>
						</div>
					</div>
				@endif
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