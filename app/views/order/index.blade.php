@extends('layout.default')


@section('content')

	<div class="board">
		<div class="board-inner">
			<ul class="nav nav-tabs" style="background:#fff;" id="myTab">
			<div class="liner"></div>
				<li class="active">
					<a><span class="round-tabs one"><i class="glyphicon glyphicon-gift"></i></span></a>
				</li>
				<li>
					<a><span class="round-tabs two"><i class="glyphicon glyphicon-time"></i></span></a>
				</li>
				<li>
					<a><span class="round-tabs three"><i class="glyphicon glyphicon-user"></i></span></a>
				</li>
				<li>
					<a><span class="round-tabs four"><i class="glyphicon glyphicon-eye-open"></i></span></a>
				</li>
				<li>
					<a><span class="round-tabs five"><i class="glyphicon glyphicon-ok"></i></span></a>
				</li>
			</ul>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered">
				<div class="panel panel-default">
					<div class="panel-body">
						<center>
							<h4>Berapa banyak storage box/item yang Anda butuhkan?</h4>
							<hr><img class="img-responsive" src="{{ asset('assets/img/standardBox.png') }}">
							<h3>STANDARD BOX: Rp.50.000/bulan per box</h3>
							<p>Our average customer stores 7 boxes</p>
						</center>

						{{ Form::open(['method' => 'POST', 'class' => 'form-horizontal']) }}
							<fieldset>
								<div class="form-group">
									<label for="select" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Jumlah box</label>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
										{{ Form::select('quantity_box', [4,5,6, 21 => 'saya butuh lebih 20'], null, ['class' => 'form-control', 'id' => 'jumlahbox']) }}
									</div>
								</div>

								<div id="many_box" class="form-group" style="display: none;"> 
									<label for="textArea" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">
										Jumlah
									</label>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
										{{ Form::number('quantity_custom', null, ['class' => 'form-control', 'min' => 21]) }}
										<span class="help-block"><i>Sales representative</i> kami akan menghubungi Anda untuk ketersediaan box</span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">
										Ingin menyimpan sesuatu yang tidak muat dalam box?
									</label>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
										<div class="radio radio-primary">
											<label>
												{{ Form::radio('type', 'box', true, ['id' => 'id_radio2']) }} Tidak
											</label>
											<label>
												{{ Form::radio('type', 'item', false, ['id' => 'id_radio1']) }} Iya tentu saja
											</label>
										</div>
									</div>
								</div>

								<div id="Wowdiv" >
									<hr>
									<center>
										<h3>OVERSIZED ITEM: IDR 150.000/bulan per item</h3>
										<p>Berat maksimal 25kg, dengan panjang maksimal 2 meter</p>
									</center>

									<div class="form-group">
										<label for="select" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Jumlah barang/item</label>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
											{{ Form::select('quantity_item', [1,2,3,4,5], null, ['class' => 'form-control', 'id' => 'jumlahitem']) }}
										</div>
									</div>
									<div class="form-group">
										<label for="select" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label">Detail barang</label>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
											{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Sebutkan dengan detail barang lainnya yang ingin Anda simpan']) }}
										</div>
									</div>
								</div>
								<!-- div ya -->
								<!-- div tidak -->
								<div id="div2"></div>
							</fieldset>
						{{ Form::close() }}

						<center>
							<a class="btn btn-primary" href="order-schedule.php">Lanjutkan</a>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop