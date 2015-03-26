@extends('layout.default')


@section('content')

	<div class="page-header" id="banner">
		<div class="text-center">
			<h3>Hai, bagaimana kabar Anda hari ini.</h3>
		</div>
	</div>


	<div class="container">
		<div class="row">
			
			<div class="col-lg-3">
				@include('user._side')
			</div>

			<div class="col-lg-9">
				@if( !isset($jancok))

					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table-striped table-hover ">
								<thead>
									<tr>
										<th></th>
										<th>Box Details</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@for($i = 1; $i <= 4; $i++)
										<tr>
											<td>
												<img class="img-responsive" src="{{ url('assets/img/box.png') }}">
											</td>
											<td>        
												<h2>Order #1321</h2>
												<h4>Box 1: Buku 2 Dus<br />
												Box 2: Lampu Meja
												Item: Kipas Angin</h4>
											</td>
											<td><span class="label label-success">Stored</span></td>
											<td>
												<div class="checkbox">
													<label><input type="checkbox"></label>
												</div>
											</td>
										</tr>
									@endfor
										
									<tr>
										<td class="text-right" colspan="4">
											<div class="btn-group">
												<a href="javascript:void(0)" class="btn btn-primary">
													Action
												</a>
												<a href="bootstrap-elements.html" data-target="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
													<span class="caret"></span>
												</a>
												<ul class="dropdown-menu">
													<li>
														<a href="javascript:void(0)">"Kirimkan kembali barang Saya"</a>
													</li>
													<!--<li><a href="javascript:void(0)">Ikutkan Storage War (soon)</a></li>-->
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