<div class="board">
	<div class="board-inner">
		<ul class="nav nav-tabs" style="background:#fff;" id="myTab">
		<div class="liner"></div>
			<li {{ ( Route::currentRouteName() == 'order.index' ? 'class="active"' : '' ) }}>
				<a><span class="round-tabs one"><i class="glyphicon glyphicon-gift"></i></span></a>
			</li>
			<li {{ ( Route::currentRouteName() == 'order.schedule' ? 'class="active"' : '' ) }}>
				<a><span class="round-tabs two"><i class="glyphicon glyphicon-time"></i></span></a>
			</li>
			<li {{ ( Route::currentRouteName() == 'order.payment' ? 'class="active"' : '' ) }}>
				<a><span class="round-tabs three"><i class="glyphicon glyphicon-user"></i></span></a>
			</li>
			<li {{ ( Route::currentRouteName() == 'order.review' ? 'class="active"' : '' ) }}>
				<a><span class="round-tabs four"><i class="glyphicon glyphicon-eye-open"></i></span></a>
			</li>
			<li {{ ( Route::currentRouteName() == 'order.completed' ? 'class="active"' : '' ) }}>
				<a><span class="round-tabs five"><i class="glyphicon glyphicon-ok"></i></span></a>
			</li>
		</ul>
	</div>
</div>