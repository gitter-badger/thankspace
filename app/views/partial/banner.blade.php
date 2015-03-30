<div class="splash">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>More Space for You</h1>

				<h4>Ruang lebih untuk berbagai barang Anda.</h4>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="sponsor">
						{{--<h3>On-demand Storage Untuk</h3>--}}
						<p>
							<a id="step2" href="#myModal4" data-toggle="modal" data-dismiss="modal" class="btn btn-warning btn-lg">
							<i class="fa fa-youtube-play"></i> <span>Watch Our Video</span> </a>
							&#32;&#32;
							<a id="step1" class="btn btn-warning btn-lg start-intro" href="#"><i class="fa fa-street-view"></i> <span>Quick Tour</span></a>
							{{-- onclick="javascript:introJs().setOption('showBullets', false).setOption('showProgress', true).start();"
							<a class="btn btn-primary btn-lg"><i class="fa fa-youtube-play"></i>  Overseas Travellers</a>--}}
						</p>
						{{--<h5>atau untuk berbagai keperluan lainnya</h5>--}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@section('footer')
	@parent
	
	{{-- Modal video  - Mulai --}}
	<div class="modal fade text-center" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Introduction Thankspace</h4><hr>
				</div>
				<div class="modal-body">
					<iframe width="520" height="415" src="//www.youtube.com/embed/rHMsOpZnt6c" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	{{-- Modal video - Selesai --}}
@stop