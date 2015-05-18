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
			@if( !Auth::check() )
			<ul class="nav navbar-nav">
				<li><a href="#location">Location</a></li>
				<li><a href="#pricing">Pricing</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Help<span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<li><a href="{{ route('page.about_us') }}">About Us</a></li>
						<li><a href="{{ route('page.faq') }}">FAQ</a></li>
					</ul>
				</li>
				<li>
					<a href="#sign-in-modal" data-toggle="modal" data-dismiss="modal">Customer Area</a>
				</li>
			</ul>
			@endif
			
			@if( Auth::check() )
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="{{ route('user.dashboard') }}" class="dropdown-toggle" data-toggle="dropdown" >
							<i class="fa fa-user" style="font-size: 14pt;"></i> {{ Auth::user()->fullname }}
						</a>
						<ul class="dropdown-menu">
							@if( Auth::user()->type == 'user' )
								<li>
									<a href="{{ route('user.dashboard') }}">
										<i class="fa fa-archive fa-fw"></i> Storage saya
									</a>
								</li>
								<li>
									<a href="{{ route('user.invoice') }}">
										<i class="fa fa-archive fa-fw"></i> Riwayat Invoice
									</a>
								</li>
								<li>
									<a href="{{ route('order.index') }}">
										<i class="fa fa-shopping-cart fa-fw"></i> Order Storage Box
									</a>
								</li>
								<li>
									<a href="{{ route('user.setting') }}">
										<i class="fa fa-gear fa-fw"></i> Pengaturan Akun
									</a>
								</li>
								<li class="divider"></li>
							@elseif( Auth::user()->type == 'admin' )
								<li>
									<a href="{{ route('user.member_list') }}">
										<i class="fa fa-users"></i> Member List
									</a>
								</li>
								<li>
									<a href="{{ route('user.dashboard') }}">
										<i class="fa fa-history"></i> Order History
									</a>
								</li>
								<li>
									<a href="{{ route('admin.returnRequest') }}">
										<i class="fa fa-truck" style="font-size: 14pt;"></i>
										Returning Request
										<!-- <span class="label label-danger">20</span> -->
									</a>
								</li>
								<li class="divider"></li>
							@elseif( Auth::user()->type == 'driver' )
								<li>
									<a href="{{ route('user.dashboard') }}">
										<i class="fa fa-archive fa-fw"></i> Dashboard
									</a>
								</li>
								<li class="divider"></li>
							@endif
							<li>
								<a href="{{ route('user.signout') }}">
									<i class="fa fa-sign-out fa-fw"></i> Sign Out
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