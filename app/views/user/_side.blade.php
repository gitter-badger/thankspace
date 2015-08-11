<ul class="nav nav-pills nav-stacked">
	<li @if(Route::currentRouteName() == 'user.dashboard') class="active" @endif >
		<a href="{{ route('user.dashboard') }}">
			My Storage
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'user.invoice') class="active" @endif >
		<a href="{{ route('user.invoice') }}">
			My Invoice
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'order.index') class="active" @endif >
		<a href="{{ route('order.index') }}">
			Order Storage Box
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'user.referral') class="active" @endif >
		<a href="{{ route('user.referral') }}">
			Referral Program
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'user.setting') class="active" @endif >
		<a href="{{ route('user.setting') }}">
			Settings
		</a>
	</li>
	<li>
		<a href="{{ route('user.signout') }}">
			Sign Out
		</a>
	</li>
</ul>

<div class="row">
	<div class="col-lg-12">
		<!--<div class="panel panel-default">-->
		<div class="panel-body">
			<div class="text-center">
				<h4>Your Space Credits
					<span data-toggle="tooltip" data-placement="top" title="Refer your friends & get paid! Even better, your friends will get paid too!">
						<img src="{{ url('assets/img/info.png') }}">
					</span>
				</h4>
				<h3> {{ "Rp ".number_format($space_credit, 0, '', '.') }}</h3>
				<p><a href="{{ route('user.referral') }}">Refer your friends today!</a></p>
			</div>
		</div>
		<!--</div>-->
	</div>
</div>