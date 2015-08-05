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