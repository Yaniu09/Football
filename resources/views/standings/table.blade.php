<div class="container">
	<div class="container text-center">
		<h2 style="margin-bottom: 50px;">Tournament Standings <button class="btn btn-danger btn-sm">LIVE</button> </h2>
	</div>
	<div class="row">
		<div class="col-lg-8 col-md-12 col-s-12 col-xs-12 mx-auto">
			@foreach ($groups as $group)
				<h3>{{ $group->name }}</h3>
				<table class="table table-sm">
					<thead>
						<tr>
						<th scope="col">Team</th>
						<th scope="col">MP</th>
						<th scope="col">GF</th>
						<th scope="col">GA</th>
						<th scope="col">GD</th>
						<th scope="col">Pts</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($group->teams as $team)
						<tr>
							<th scope="row">{{ $team->name }}</th>
							<td>{{ $team->standing->mp }}</td>
							<td>{{ $team->standing->gf }}</td>
							<td>{{ $team->standing->ga }}</td>
							<td>{{ $team->standing->gd }}</td>
							<td>{{ $team->standing->pts }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@endforeach
		</div>
	</div>
</div>