@extends('layout.default')


@section('content')

	<div class="page-header" id="banner">
		<div class="text-center">
			<h3>Hi, {{ Auth::user()->firstname }}, how are you doing today? :)</h3>
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
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach( $storages as $storage )
										<tr>
											<td align="center">
												<img class="img-responsive" src="{{ url('assets/img/box.png') }}">
											</td>
											<td>
												<h3>Order #{{ $storage->code }}</h3>
												<p>
													<a data-toggle="modal" href="{{ route('ajax.modalStorageDetail', $storage->id) }}" data-target="#ajaxModal">
														Detail
													</a>
													@if( $storage->order_schedule->status != 1 )
													&nbsp;&nbsp;
													<a data-toggle="modal" href="{{ route('ajax.modalStorageEdit', $storage->id) }}" data-target="#ajaxModal">
														Edit Stuff
													</a>
													@endif
													&nbsp;&nbsp;
													<a data-toggle="modal" href="{{ route('ajax.modalOrderGallery', $storage->id) }}" data-target="#ajaxModal2">
														Gallery
													</a>
												</p>

												@if( $storage->type == 'item' )
													Item : {{ $storage->description }}
												@else
													<?php $i = 1 ?>
													@foreach( $storage->order_stuff->take(5) as $stuff )
													@if( $stuff->description AND ! $stuff['return_schedule_id'] || $storage->is_returned == 1 )
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
												@if( $storage->is_returned == 1 )
												<span class="label label-default">Returned</span>
												@elseif( $storage->order_schedule->status == 1 )
												<span class="label label-success">Stored</span>
												@else
												<span class="label label-warning">On Delivery</span>
												@endif
											</td>
											<td>
												@if( $storage->order_schedule->status == 1 && $storage->is_returned == 0 )
												<a data-toggle="modal" href="{{ route('ajax.modalStorageReturn', $storage->id) }}" data-target="#ajaxModal">
													<i class="fa fa-sign-out"></i>
													Kembalikan
												</a>
												@endif
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
								<h3>Anda belum menyimpan storage box atau barang pada tempat penyimpanan kami.</h3>
								<p>Pesan storage box sesuai dengan kebutuhan Anda sekarang.</p>
								<p>
									<a class="btn btn-primary" href="{{ route('order.index') }}">Order Now!</a>
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
	
	<div class="modal fade" id="ajaxModal2" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel2" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				{{-- Modal Ajax 2 Content --}}
			</div>
		</div>
	</div>


	<script type="text/javascript">

		// disable ajax modal cache
		$('#ajaxModal').on('shown.bs.modal', function ()
		{
			$(this).removeData('bs.modal');
		});
		
		$('#ajaxModal2').on('shown.bs.modal', function ()
		{
			$(this).removeData('bs.modal');
		});

	</script>
@stop