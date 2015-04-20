@extends('layout.default')


@section('content')

	<div class="page-header" id="banner">
		<div class="text-center">
			<h3>Delivery Team, Go Go Go</h3>
		</div>
	</div>

	<div class="container">
		<div class="row">
			
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						
						<h3>Order yang Anda tangani</h3>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Order Number</th>
									<th>Customer</th>
									<th>Phone</th>
									<th>Alamat</th>
									<th>Box Yang dibutuhkan</th>
									<th>Barang Lain</th>
									<th>Jadwal Box Diantar</th>
									<th>Jadwal Box Diambil</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>2354</td>
									<td><a href="">Clark Kent</a></td>
									<td>5964441</td>
									<td>Jl. Gembong Sawah n0.6 denpasar surabaya</td>
									<td>5</td>
									<td>Sofa, Meja, Lemari</td>
									<td>25-12-2015</td>
									<td>25-12-2015</td>
									<td>Siap Diantar</td>
									<td>
										<div class="checkbox">
											<label><input type="checkbox"></label>
										</div>
									</td>
								</tr>
								<tr>
									<td>3217</td>
									<td><a href="">Deny Setiawan</a></td>
									<td>5964441</td>
									<td>Jl. Gembong Sawah n0.6 denpasar surabaya</td>
									<td>8</td>
									<td>0</td>
									<td>01-05-2015</td>
									<td>01-05-2015</td>
									<td>Sudah diantar di Warehouse</td>
									<td>
										<div class="checkbox">
											<label><input type="checkbox"></label>
										</div>
									</td>
								</tr>
								<tr>
									<td>4412</td>
									<td><a href="">Akbar</a></td>
									<td>5964441</td>
									<td>Jl. Gembong Sawah n0.6 denpasar surabaya</td>
									<td>12</td>
									<td>0</td>
									<td>01-05-2015</td>
									<td>01-05-2015</td>								
									<td>Sudah dikembalikan</td>
									<td><!--
										<div class="checkbox">
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
												<li><a href="javascript:void(0)">"Sudah sampai Warehouse"</a></li>
												<li><a href="javascript:void(0)">"Sudah dikembalikan"</a></li>
											</ul>
										</div>
									</td>
								</tr>

							</tbody>
						</table>


						<h3 id="queue">Daftar antrian order yang tersedia</h3>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Order Number</th>
									<th>Customer</th>
									<th>Phone</th>
									<th>Alamat</th>
									<th>Box Yang dibutuhkan</th>
									<th>Barang Lain</th>
									<th>Jadwal Box Diantar</th>
									<th>Jadwal Box Diambil</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>

								@if( count($storages) > 0 )
								@foreach($storages as $s)
									<tr>
										<td>{{ $s['code'] }}</td>
										<td>{{ $s['user']['fullname'] }}</td>
										<td>{{ $s['user']['phone'] }}</td>
										<td>{{ $s['user']['address'] }}</td>
										<td>{{ $s['quantity'] }}</td>
										<td>{{ $s['description'] }}</td>
										<td>{{ $s['order_schedule']['delivery_date'] }}</td>
										<td>
											{{ $s['order_schedule']['pickup_date'] or $s['order_schedule']['delivery_date'] }}
										</td>
										<td>
											<div class="checkbox">
												<label>
													{{ Form::checkbox('order_id[]', $s['id'], null, []) }}
												</label>
											</div>
										</td>
									</tr>
								@endforeach
								@else
									<tr>
										<td colspan="9">
											<h4 class="text-center">Masih kosong</h4>
										</td>
									</tr>
								@endif

								<tr>
									<td colspan="7">
										{{ $storages->fragment('queue')
											->links() }}
									</td>
									<td class="text-right" colspan="2">
										<div class="btn-group">
											<a href="javascript:void(0)" class="btn btn-primary">Action</a>
											<a href="bootstrap-elements.html" data-target="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="javascript:void(0)">"Saya tangani order ini"</a></li>
											</ul>
										</div>
									</td>
								</tr>

							</tbody>
						</table>

					</div>
				</div>
			</div>

		</div>
	</div>

@stop