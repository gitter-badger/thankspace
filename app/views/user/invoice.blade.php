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
				@if( isset($jancok))

					<div class="panel panel-default text-center">
						<div class="panel-body">

							<h3>Riwayat Order Terbaru</h3>
							<p>
								<span class="success-alert">
									<i class="fa fa-smile-o"></i> Konfirmasi pembayaran sudah dilakukan. Tim Customer Service kami akan melakukan proses verifikasi dan akan memberikan informasi terbaru kepada Anda.
								</span>
							</p>
							<table class="table table-striped table-hover ">
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
									<tr class="danger">
										<td>2354</td>
										<td>10</td>
										<td>Kulkas</td>
										<td>25-12-2015</td>
										<td>25-12-2015</td>
										<td>650000</td>
										<td><span class="label label-danger">Pending Payment</span></td>
										<td>
											<div class="checkbox">
											<label><input type="checkbox"></label>
											</div>
										</td>
									</tr>
									<tr class="info">
										<td>2354</td>
										<td>5</td>
										<td>Sofa, Meja, Lemari</td>
										<td>25-12-2015</td>
										<td>25-12-2015</td>
										<td>452000</td>
										<td><span class="label label-info">Menunggu Konfirmasi</span></td>
										<td>
											<!--<div class="checkbox">
												<label><input type="checkbox"></label>
											</div>-->
										</td>
									</tr>
									<tr class="success">
										<td>3217</td>
										<td>8</td>
										<td>0</td>
										<td>01-05-2015</td>
										<td>01-05-2015</td>
										<td>250000</td>
										<td><span class="label label-success">Completed Payment</span> </td>
										<td>
											<!--<div class="checkbox">
												<label><input type="checkbox"></label>
											</div>-->
										</td>
									</tr>
									<tr class="success">
										<td>4412</td>
										<td>12</td>
										<td>0</td>
										<td>01-05-2015</td>
										<td>01-05-2015</td>
										<td>250000</td>
										<td><span class="label label-success">Completed Payment</span> </td>
										<td>
											<!--<div class="checkbox">
												<label><input type="checkbox"></label>
											</div>-->
										</td>
									</tr>
									<tr class="success">
										<td>4412</td>
										<td>12</td>
										<td>0</td>
										<td>01-05-2015</td>
										<td>01-05-2015</td>
										<td>250000</td>
										<td><span class="label label-success">Completed Payment</span> </td>
										<td>
											<!--<div class="checkbox">
												<label><input type="checkbox"></label>
											</div>-->
										</td>
									</tr>
									<tr class="success">
										<td>4412</td>
										<td>12</td>
										<td>0</td>
										<td>01-05-2015</td>
										<td>01-05-2015</td>
										<td>250000</td>
										<td><span class="label label-success">Completed Payment</span> </td>
										<td>
											<!--<div class="checkbox">
												<label><input type="checkbox"></label>
											</div>-->
										</td>
									</tr>
									<tr>
										<td class="text-right" colspan="9">
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