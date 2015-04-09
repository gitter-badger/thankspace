<div class="row">
	<div class="col-md-1"> </div>
	<div class="col-md-10">

		<table class="table table-bordered table-striped">
			<tbody>
				<tr>
					<th>Name</th>
					<td>{{ Auth::user()->fullname }}</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>{{ Auth::user()->email }}</td>
				</tr>
				<tr>
					<th>Country</th>
					<td>{{ ( isset(Auth::user()->city->country->name)) ? Auth::user()->city->country->name : '' }}</td>
				</tr>
				<tr>
					<th>City</th>
					<td>{{ ( isset(Auth::user()->city->name)) ? Auth::user()->city->name : '' }}</td>
				</tr>
				<tr>
					<th>Address</th>
					<td>{{ Auth::user()->address }}</td>
				</tr>
				<tr>
					<th>Phone</th>
					<td>{{ Auth::user()->phone }}</td>
				</tr>
			</tbody>
		</table>

	</div>
	<div class="col-md-1"> </div>
</div>