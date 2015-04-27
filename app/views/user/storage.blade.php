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
				@if( count($storages) > 0 )

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
									@foreach( $storages as $storage )
										<tr>
											<td align="center">
												<img class="img-responsive" src="{{ url('assets/img/box.png') }}">
											</td>
											<td>
												<h2>Order #{{ $storage->code }}</h2>
												<p>
													<a data-toggle="modal" href="{{ route('ajax.modalStorageDetail', $storage->id) }}" data-target="#ajaxModal">
														Detail
													</a>
													&nbsp;&nbsp;
													<a data-toggle="modal" href="{{ route('ajax.modalStorageEdit', $storage->id) }}" data-target="#ajaxModal">
														Edit Stuff
													</a>
												</p>
												<h4>
													@if( $storage->type == 'item' )
														Item : {{ $storage->description }}
													@else
														{{--*/ $i = 1 /*--}}
														@foreach( $storage->order_stuff as $stuff )
														@if( $stuff->description )
														{{ ucfirst($stuff->type) }} {{ $i }} : {{ $stuff->description }}<br>
														{{--*/ $i++ /*--}}
														@endif
														@endforeach
													@endif
												</h4>
											</td>
											<td>
												@if( $storage->order_schedule->status == 1 )
												<span class="label label-success">Stored</span>
												@else
												<span class="label label-warning">On Delivery</span>
												@endif
											</td>
											<td>
												<div class="checkbox">
													<label><input name="order_id[]" type="checkbox" value="{{ $storage->id }}" /></label>
												</div>
											</td>
										</tr>
									@endforeach
										
									<tr>
										<td class="text-left" colspan="2">
											{{ $storages->links() }}
										</td>
										<td class="text-right" colspan="2" style="vertical-align:middle;">
											<div class="btn-group">
												<button type="button" class="btn btn-primary">Action</button>
												<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
													<span class="caret"></span>
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu pull-right">
													<li>
														<a href="javascript:void(0)">Kirimkan kembali barang Saya</a>
													</li>
													{{--<li><a href="javascript:void(0)">Ikutkan Storage War (soon)</a></li>--}}
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