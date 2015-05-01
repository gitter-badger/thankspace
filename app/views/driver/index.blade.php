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
						<p>
							<a href="{{ route('user.dashboard') }}?sch=return">Jadwal Pengembalian Barang</a>
						</p>
						
						@if ( Session::has('message') )
						<p class="text-center">
							<span class="{{ Session::get('message.type') }}-alert">
								<i class="fa fa-{{ Session::get('message.ico') }}-o"></i> {{ Session::get('message.msg') }}
							</span>
						</p>
						@endif
						
						<h3>Order yang Anda tangani</h3>
						<div class="table-responsive">
							{{ Form::open([ 'route' => 'user.delivery.stored', 'method' => 'POST', 'class' => 'delivery-form-list' ]) }}
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Order Number</th>
										<th>Customer</th>
										<th>Phone</th>
										<th>Alamat</th>
										<th>Box Yang dibutuhkan</th>
										<th>Jadwal Box Diantar</th>
										<th>Jadwal Box Diambil</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								@if( count($tasks) > 0 )
								@foreach( $tasks as $t )
									<tr>
										<td>#{{ $t->code }}</td>
										<td>{{ $t->order->user->fullname }}</td>
										<td>{{ $t->order->user->phone }}</td>
										<td>{{ $t->order->user->address }}</td>
										<td>{{ $t->order->quantity }}</td>
										<td>{{ $t->order->order_schedule->delivery_date }}</td>
										<td>
											{{ $t->order->order_schedule->pickup_date or $t->order->order_schedule->delivery_date }}
										</td>
										<td>
											@if( $t->order->order_schedule->status == 1 )
											<span class="label label-success">Stored</span>
											@else
											<span class="label label-warning">Siap Diantar</span>
											@endif
										</td>
										<td>
											@if( $t->order->order_schedule->status != 1 )
											<div class="checkbox">
												<label>
													{{ Form::checkbox('order_schedule_id[]', $t->id, null, []) }}
												</label>
											</div>
											@endif
										</td>
									</tr>
								@endforeach
									<tr>
										<td class="text-left" colspan="7">
											{{ $tasks->fragment('task')->links() }}
										</td>
										<td class="text-right" colspan="2" style="vertical-align:middle;">
											<div class="btn-group">
												<button type="button" class="btn btn-primary">Action</button>
												<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
													<span class="caret"></span>
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" class="setStored">Sudah sampai Warehouse</a></li>
												</ul>
											</div>
										</td>
									</tr>
								@else
									<tr>
										<td colspan="9">
											<h4 class="text-center">Masih kosong</h4>
										</td>
									</tr>
								@endif
								
								</tbody>
							</table>
							{{ Form::close() }}
						</div>

						<h3 id="queue">Daftar antrian order yang tersedia</h3>
						<div class="table-responsive">
							{{ Form::open([ 'route' => 'user.assign_delivery', 'method' => 'POST', 'class' => 'schedule-form-list' ]) }}
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Order Number</th>
										<th>Customer</th>
										<th>Phone</th>
										<th>Alamat</th>
										<th>Box Yang dibutuhkan</th>
										<th>Jadwal Box Diantar</th>
										<th>Jadwal Box Diambil</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

									@if( count($storages) > 0 )
									@foreach($storages as $s)
										@if( !$s['delivery_schedule'] )
										<tr>
											<td>#{{ $s['code'] }}</td>
											<td>{{ $s['user']['fullname'] }}</td>
											<td>{{ $s['user']['phone'] }}</td>
											<td>{{ $s['user']['address'] }}</td>
											<td>{{ $s['quantity'] }}</td>
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
										@endif
									@endforeach
										<tr>
											<td colspan="6">
												{{ $storages->fragment('queue')->links() }}
											</td>
											<td class="text-right" colspan="2" style="vertical-align:middle;">
												<div class="btn-group">
													<button type="button" class="btn btn-primary">Action</button>
													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="assignDelivery">Saya tangani order ini</a></li>
													</ul>
												</div>
											</td>
										</tr>
									@else
										<tr>
											<td colspan="8">
												<h4 class="text-center">Masih kosong</h4>
											</td>
										</tr>
									@endif
									
								</tbody>
							</table>
							{{ Form::close() }}
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

@stop