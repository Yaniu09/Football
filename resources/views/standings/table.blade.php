<div class="container">
	<div class="container text-center">
		<h2 style="margin-bottom: 50px;">Tournament Standings</h2>
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
						<th class="d-s-none" scope="col">GF</th>
						<th class="d-s-none" scope="col">GA</th>
						<th scope="col">GD</th>
						<th scope="col">Pts</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($group->teams as $team)
						<tr>
							<th scope="row">{{ $team->name }}</th>
							<td>{{ $team->standing->mp }}</td>
							<td class="d-s-none">{{ $team->standing->gf }}</td>
							<td class="d-s-none">{{ $team->standing->ga }}</td>
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