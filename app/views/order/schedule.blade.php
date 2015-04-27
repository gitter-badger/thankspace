@extends('layout.default')


@section('content')

	@include('order._board')

	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered">
				<div class="panel panel-default">
					<div class="panel-body">

						@if( Session::has('messages'))
							<div class="alert alert-danger">
								@foreach(Session::get('messages') as $m)
									<div>{{ $m }}</div>
								@endforeach
							</div>
						@endif

						<center>
							<h4>Jadwal pengantaran/pengambilan storage box/item</h4>
							<hr>
							<h3>Kapan kami mengantarkan storage box Anda?</h3>
							<p>Jadwalkan tanggal pengiriman storage box sesuai dengan waktu Anda</p>
						</center>
						<br><br>

						{{ Form::model($form_data, ['method' => 'POST', 'route' => 'order.progress', 'class' => 'form-horizontal']) }}
							{{ Form::hidden('step', 'schedule') }}
							{{ Form::hidden('redirect_to', route('order.payment')) }}
							<fieldset>
								<div class="form-group">
									<label for="select" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Tanggal pengiriman</label>
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
										{{ Form::select('delivery_day', $calendar['date'], null, ['class' => 'form-control', 'id' => 'deliveryday']) }}
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										{{ Form::select('delivery_month', $calendar['month'], null, ['class' => 'form-control', 'id' => 'deliverymonth']) }}
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
										{{ Form::select('delivery_year', $calendar['year'], null, ['class' => 'form-control', 'id' => 'deliveryyear']) }}
									</div>
								</div>
								<div class="form-group">
									<label for="select" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Waktu pengiriman</label>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
										{{ Form::select('delivery_time', Config::get('thankspace.office_hours'), null, ['class' => 'form-control', 'id' => 'deliverytime']) }} 
									</div>
									<span class="help-block"><i>Thankspace office hours:</i> mon-fri, 08:00am - 06:00pm</span>
								</div>
								<hr>
								<center>
									<h3>Kapan kami mengambil kembali storage box?</h3>
									<p>Jadwalkan tanggal pengambilan storage box sesuai dengan waktu Anda</p>
								</center>
								<br><br>
								<div class="form-group">
									<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Jadwal Pengambilan?</label>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
										<div class="radio radio-primary">
											<label>
												{{ Form::radio('type', 'immediately', true, ['id' => 'id_radio2']) }}
												Ambil saat itu juga
											</label>
											<span class="help-block"><i>Delivery Team</i> kami akan menunggu hingga 20 menit saat Anda mengepak barang Anda.</span>
										</div>
										<div class="radio radio-primary">
											<label>
												{{ Form::radio('type', 'later', false, ['id' => 'id_radio1']) }} Ambil di kemudian hari
											</label>
										</div>
									</div>
								</div>
								

								<div id="Wowdiv" >
									<div class="form-group">
										<label for="select" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Tanggal Pengambilan</label>

										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
											{{ Form::select('pickup_day', $calendar['date'], null, ['class' => 'form-control']) }}
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											{{ Form::select('pickup_month', $calendar['month'], null, ['class' => 'form-control', 'id' => 'pickupmonth']) }}
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											{{ Form::select('pickup_year', $calendar['year'], null, ['class' => 'form-control', 'id' => 'pickupyear']) }}
										</div>
									</div>
									<div class="form-group">
										<label for="select" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Waktu Pengambilan</label>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
											{{ Form::select('pickup_time', Config::get('thankspace.office_hours'), null, ['class' => 'form-control', 'id' => 'pickuptime']) }} 
										</div>
										<span class="help-block"><i>Thankspace office hours:</i> mon-fri, 08:00am - 06:00pm</span>
									</div>
								</div>
								<div id="div2"></div>
							</fieldset>
							<center>
								<button type="submit" class="btn btn-primary">
									Lanjutkan
								</button>
							</center>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>

@stop