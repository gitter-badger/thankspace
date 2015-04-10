@extends('layout.default')


@section('content')

	@include('order._board')

	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered">
				<div class="panel panel-default">
					<div class="panel-body ">
						@if( Session::has('messages'))
							<div class="alert alert-danger">
								@foreach(Session::get('messages') as $m)
									<div>{{ $m }}</div>
								@endforeach
							</div>
						@endif
						<center>
							<h4>Detail diri Anda</h4><hr>
						</center>
						<br><br>
						{{ Form::model($form_data, ['method' => 'POST', 'route' => 'order.progress', 'class' => 'form-horizontal']) }}
							{{ Form::hidden('step', 'payment') }}
							{{ Form::hidden('redirect_to', route('order.review')) }}
							<fieldset>
								
								@if(Auth::check())
									@include('order._payment_user_info')
								@else
									@include('order._payment_user_form')
								@endif

								<hr>
								<center>
									<h3>Pilih Cara Pembayaran</h3>
								</center>
								<br><br>
								<div class="form-group">
									<label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Metode Pembayaran?</label>
									<div class="col-lg-9 col-md-9col-sm-9 col-xs-9">
										<div class="radio radio-primary">
											<label>
												{{ Form::radio('method', 'bank', true, ['id' => 'payment1']) }} Bank Transfer
											</label>
										</div>   
									</div>
								</div>
								<div class="form-group"> 
									<label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Pesan Tambahan</label>
									<div class="col-lg-9 col-md-9col-sm-9 col-xs-9">
										{{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Optional..']) }} 
									</div>
								</div>
							</fieldset>
							<center>
								<button type="submit" class="btn btn-primary">
									Lanjutkan
								</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop