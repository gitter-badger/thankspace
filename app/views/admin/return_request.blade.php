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
			<div class="panel panel-default">
				<div class="panel-body">
					
					@if ( Session::has('message.success') )
						<div class="alert alert-success text-center">
							<p>{{ Session::get('message.success') }}</p>
						</div>
						<hr>
					@endif

					<div class="row">
						<div class="col-lg-12">
							<h3 class="text-center">Returning Request</h3>
							
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Order Code</th>
											<th>Customer</th>
											<th>Barang</th>
											<th>Alamat Kembali</th>
											<th>Jadwal kembali</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
									@if( count($returns) > 0 )
										@foreach($returns as $return)
											<tr>
												<td>
													<a data-toggle="modal" href="{{ route('ajax.modalInvoiceDetail', $return['order']['id']) }}?without_detail_stuff=1" data-target="#ajaxModal">
														#{{ $return['order']['order_payment']['code'] }}
													</a>
												</td>
												<td>
													<b>{{ $return['order']['user']['fullname'] }}</b>
													<div>{{ $return['order']['user']['phone'] }}</div>
													<div>{{ $return['order']['user']['address'] }}</div>
												</td>
												<td valign="top">
													@if($return['stuffs'])
														@foreach($return['stuffs'] as $stuff)
															<li>{{ $stuff['description'] }}</li>
														@endforeach
													@endif
												</td>
												<td>{{ $return['other_address'] }}</td>
												<td>
													<div>{{ makeFormatTime($return['return_date']) }}</div>
													<small>{{ $return['return_time'] }}</small>
												</td>
												<td>
													{{--
													{{ Form::open(['url' => route('admin.postReturnRequest', $return['id'])]) }}
														<button class="btn btn-success btn-sm">
															<i class="fa fa-check"></i>
															Konfirmasi
														</button>
													{{ Form::close() }}
													--}}

													<a href="{{ route('ajax.returnRequestConfirmation', $return['order']['id']) }}" data-toggle="modal" data-target="#ajaxModal" class="btn btn-primary btn-sm">
														<i class="fa fa-check"></i>
														Konfirmasi
													</a>
												</td>
											</tr>
										@endforeach
									@else
										Tidak ada
									@endif
									</tbody>
								</table>

								<div class="text-center">
									{{ $returns->links() }}
								</div>

							</div>
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