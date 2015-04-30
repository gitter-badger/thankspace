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

												@if( $storage->type == 'item' )
													Item : {{ $storage->description }}
												@else
													<?php $i = 1 ?>
													@foreach( $storage->order_stuff->take(5) as $stuff )
													@if( $stuff->description AND ! $stuff['return_schedule_id'])
														<h4 style="margin: 3px 0px;">
															{{ ucfirst($stuff->type) }} {{ $i++ }} : {{ $stuff->description }}
														</h4>
													@endif
													@endforeach

													@if(count($storage->order_stuff) > 5)
														<a data-toggle="modal" href="{{ route('ajax.modalStorageDetail', $storage->id) }}" data-target="#ajaxModal">
															see more...
														</a>
													@endif
												@endif
											</td>
											<td>
												@if( $storage->order_schedule->status == 1 )
												<span class="label label-success">Stored</span>
												@else
												<span class="label label-warning">On Delivery</span>
												@endif
											</td>
											<td>
												{{-- <div class="checkbox">
													<label><input name="order_id[]" type="checkbox" value="{{ $storage->id }}" /></label>
												</div> --}}
												<a data-toggle="modal" href="{{ route('ajax.modalStorageReturn', $storage->id) }}" data-target="#ajaxModal">
													<i class="fa fa-sign-out"></i>
													Kembalikan
												</a>
											</td>
										</tr>
									@endforeach
										
									<tr>
										<td class="text-left" colspan="4">
											{{ $storages->links() }}
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