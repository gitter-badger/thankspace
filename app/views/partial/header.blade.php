<div class="navbar navbar-default navbar-fixed-top navbar-transparent">
	<div class="container">
		<div class="navbar-header">
			<a href="{{ route('page.index') }}" class="navbar-brand"><img src="{{ asset('assets/img/logo-nav.png') }}"></a>          
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<li><a href="#location">Location</a></li>
				<li><a href="#pricing">Pricing</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Help<span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<li><a href="#">About Us</a></li>
						<li><a href="{{ route('page.faq') }}">FAQ</a></li>
					</ul>
				</li>
				<li>
					<a href="#myModal" data-toggle="modal" data-target=".bs-example-modal-sm">Customer Area</a>
				</li>
			</ul>
			
			@if(Auth::check())
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="{{ route('user.storage') }}" class="dropdown-toggle" data-toggle="dropdown" >
							<i class="fa fa-user" style="font-size: 14pt;"></i> {{ Auth::user()->fullname }}
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{ route('user.storage') }}">
									<i class="fa fa-archive fa-fw"></i>
									Storage saya
								</a>
							</li>
							<li>
								<a href="{{ route('user.invoice') }}">
									<i class="fa fa-archive fa-fw"></i>
									Riwayat Invoice
								</a>
							</li>
							<li>
								<a href="{{ route('order.index') }}">
									<i class="fa fa-shopping-cart fa-fw"></i>
									Order Storage Box
								</a>
							</li>
							<li>
								<a href="{{ route('user.setting') }}">
									<i class="fa fa-gear fa-fw"></i>
									Pengaturan Akun
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="{{ route('user.signout') }}">
									<i class="fa fa-sign-out fa-fw"></i>
									Sign Out
								</a>
							</li>
						</ul>
					</li>
				</ul>
			@else
				<ul class="nav navbar-nav navbar-right" >
					<li>
						<center>
							<a href="{{ route('order.index') }}">
								<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i> Order</button>
							</a>
						</center>
					</li>
				</ul>
			@endif

		</div>
	</div>
</div>