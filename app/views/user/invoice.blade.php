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
				@if( $invoices )

					<div class="panel panel-default text-center">
						<div class="panel-body">

							<h3>Riwayat Order Terbaru</h3>
							<p>
								<span class="success-alert">
									<i class="fa fa-smile-o"></i> Konfirmasi pembayaran sudah dilakukan. Tim Customer Service kami akan melakukan proses verifikasi dan akan memberikan informasi terbaru kepada Anda.
								</span>
							</p>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Invoice Number</th>
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
										<td>{{ $invoice->id }}</td>
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
												<label><input type="checkbox" /></label>
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
												<a href="javascript:void(0)" class="btn btn-primary">Action</a>
												<a href="bootstrap-elements.html" data-target="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a href="javascript:void(0)">Konfirmasi pembayaran</a></li>
												</ul>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				@else
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="text-center">
								<h3>Saat ini Anda belum menyimpan sesuatu pada tempat penyimpanan/<i>Warehouse</i> kami.</h3>
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