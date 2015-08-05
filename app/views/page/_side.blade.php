
<ul class="nav nav-pills nav-stacked">
	<li @if(Route::currentRouteName() == 'page.about_us') class="active" @endif >
		<a href="{{ route('page.about_us') }}">
			About Us
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'page.careers') class="active" @endif >
		<a href="{{ route('page.careers') }}">
			Careers
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'page.partnership') class="active" @endif >
		<a href="{{ route('page.partnership') }}">
			Partnership
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'page.tos') class="active" @endif >
		<a href="{{ route('page.tos') }}">
			Term of Services
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'page.storage_rules') class="active" @endif >
		<a href="{{ route('page.storage_rules') }}">
			Storage Rules
		</a>
	</li>
	<li @if(Route::currentRouteName() == 'page.contact_us') class="active" @endif >
		<a href="{{ route('page.contact_us') }}">
			Contact Us
		</a>
	<li @if(Route::currentRouteName() == 'page.faq') class="active" @endif >
		<a href="{{ route('page.faq') }}">
			FAQ
		</a>
	</li>
</ul>