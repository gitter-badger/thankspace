<div class="board">
	<div class="board-inner">
		<ul class="nav nav-tabs" style="background:#fff;" id="myTab">
		<div class="liner"></div>
			<li @if(Route::currentRouteName() == 'order.index') class="active" @endif>
				<a><span class="round-tabs one"><i class="glyphicon glyphicon-gift"></i></span></a>
			</li>
			<li @if(Route::currentRouteName() == 'order.schedule') class="active" @endif>
				<a><span class="round-tabs two"><i class="glyphicon glyphicon-time"></i></span></a>
			</li>
			<li @if(Route::currentRouteName() == 'order.payment') class="active" @endif>
				<a><span class="round-tabs three"><i class="glyphicon glyphicon-user"></i></span></a>
			</li>
			<li @if(Route::currentRouteName() == 'order.review') class="active" @endif>
				<a><span class="round-tabs four"><i class="glyphicon glyphicon-eye-open"></i></span></a>
			</li>
			<li @if(Route::currentRouteName() == 'order.completed') class="active" @endif>
				<a><span class="round-tabs five"><i class="glyphicon glyphicon-ok"></i></span></a>
			</li>
		</ul>
	</div>
</div>