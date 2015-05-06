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
							<a href="{{ route('user.dashboard') }}">Jadwal Pengiriman Box</a>
						</p>
						
						@if ( Session::has('message') )
						<p class="text-center">
							<span class="{{ Session::get('message.type') }}-alert">
								<i class="fa fa-{{ Session::get('message.ico') }}-o"></i> {{ Session::get('message.msg') }}
							</span>
						</p>
						@endif
						
						<h3>Jadwal yang Anda tangani</h3>
						<div class="table-responsive">
							{{ Form::open([ 'route' => 'user.return.set', 'method' => 'POST', 'class' => 'return-form-list' ]) }}
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Order Number</th>
										<th>Customer</th>
										<th>Phone</th>
										<th>Alamat</th>
										<th>Barang</th>
										<th>Jadwal Kembali</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								@if( count($tasks) > 0 )
								@foreach( $tasks as $t )
									<tr>
										<td>#{{ $t['order']['order_payment']['code'] }}</td>
										<td>{{ $t['order']['user']['fullname'] }}</td>
										<td>{{ $t['order']['user']['phone'] }}</td>
										<td>
											{{ $t['other_address'] or $t['order']['user']['address'] }}
										</td>
										<td>
											<a data-toggle="modal" href="{{ route('ajax.modalReturnedStuff', $t['id']) }}" data-target="#ajaxModal">
												Click to view
											</a>
										</td>
										<td>
											{{ $t['return_date']->format('l, d m Y') }}
											<br>
											{{ $t['return_time'] }}
										</td>
										<td>
											@if( $t['status'] == 1 )
											<span class="label label-success">Returned</span>
											@else
											<span class="label label-warning">Siap Dikembalikan</span>
											@endif
										</td>
										<td>
											@if( $t['status'] != 1 )
											<div class="checkbox">
												<label>
													{{ Form::checkbox('return_schedule_id[]', $t['id'], null, []) }}
												</label>
											</div>
											@endif
										</td>
									</tr>
								@endforeach
									<tr>
										<td colspan="6">
											{{ $tasks->appends([ 'sch' => 'return' ])->fragment('task')->links() }}
										</td>
										<td class="text-right" colspan="2" style="vertical-align:middle;">
											<div class="btn-group">
												<button type="button" class="btn btn-primary">Action</button>
												<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
													<span class="caret"></span>
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" class="setReturned">Sudah sampai Customer</a></li>
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

						<h3 id="queue">Daftar jadwal yang tersedia</h3>
						<div class="table-responsive">
							{{ Form::open([ 'route' => 'user.assign_return', 'method' => 'POST', 'class' => 'schedule-form-list' ]) }}
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Order Number</th>
										<th>Customer</th>
										<th>Phone</th>
										<th>Alamat</th>
										<th>Barang</th>
										<th>Jadwal Kembali</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

									@if( count($schedules) > 0 )
									@foreach($schedules as $s)
										@if( !$s['delivery_schedule'] )
										<tr>
											<td>#{{ $s['order']['order_payment']['code'] }}</td>
											<td>{{ $s['order']['user']['fullname'] }}</td>
											<td>{{ $s['order']['user']['phone'] }}</td>
											<td>
												{{ $s['other_address'] or $s['order']['user']['address'] }}
											</td>
											<td>
												<a data-toggle="modal" href="{{ route('ajax.modalReturnedStuff', $s['id']) }}" data-target="#ajaxModal">
													Click to view
												</a>
											</td>
											<td>
												{{ $s['return_date']->format('l, d m Y') }}
												<br>
												{{ $s['return_time'] }}
											</td>
											<td>
												<div class="checkbox">
													<label>
														{{ Form::checkbox('return_schedule_id[]', $s['id'], null, []) }}
													</label>
												</div>
											</td>
										</tr>
										@endif
									@endforeach
										<tr>
											<td colspan="5">
												{{ $schedules->appends([ 'sch' => 'return' ])->fragment('queue')->links() }}
											</td>
											<td class="text-right" colspan="2" style="vertical-align:middle;">
												<div class="btn-group">
													<button type="button" class="btn btn-primary">Action</button>
													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="assignReturn">Saya tangani jadwal ini</a></li>
													</ul>
												</div>
											</td>
										</tr>
									@else
										<tr>
											<td colspan="7">
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