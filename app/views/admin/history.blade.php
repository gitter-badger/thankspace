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
			<h3>Administration Panel</h3>
		</div>
	</div>
	<div class="container">
		<div class="col-lg-12 col-centered">
			<div class="panel panel-default text-center">
				<div class="panel-body">
					<div class="col-lg-12">
						@include('admin._stats')
					</div>
					
					<div class="col-lg-12">
						<hr>
					</div>
					
					<h3>Riwayat Order Terbaru</h3>
					
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
					
					{{ Form::open([ 'method' => 'POST', 'class' => 'invoice-form-list' ]) }}
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>Order Number</th>
								<th>Customer</th>
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
							@if( $invoice->return_schedule && $invoice->return_schedule->status == 1 )
							<tr>
							@elseif( $invoice->order_schedule->status == 1 )
							<tr class="success">
							@elseif( $invoice->order_payment->status == 2 )
							<tr class="info">
							@else
							<tr class="danger">
							@endif
								<td>{{ $invoice->id }}</td>
								<td><a href="">{{ $invoice->user->fullname }}</a></td>
								<td>{{ $invoice->quantity }}</td>
								<td>{{ $invoice->description ? : '---' }}</td>
								<td>{{ date('d-m-Y', strtotime($invoice->order_schedule->delivery_date)) }}</td>
								<td>
									@if( !$invoice->order_schedule->pickup_date )
									{{ date('d-m-Y', strtotime($invoice->order_schedule->delivery_date)) }}
									@else
									{{ date('d-m-Y', strtotime($invoice->order_schedule->pickup_date)) }}
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
									@if( $invoice->return_schedule && $invoice->return_schedule->status == 1 )
									<span class="label label-default">Returned</span>
									@elseif( $invoice->order_schedule->status == 1 )
									<span class="label label-success">Stored</span>
									@elseif( $invoice->order_payment->status == 2 )
									<span class="label label-info">Completed Payment</span>
									@else
									<span class="label label-danger">Pending Payment</span>
									@endif
								</td>
								<td>
									@if( $invoice->order_payment->status == 1 )
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
								<td class="text-right" colspan="4" style="vertical-align:middle;">
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
		</div>
	</div>

@stop