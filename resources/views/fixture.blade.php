@extends('layouts.app')

@section('content')
    <header class="bg-primary text-white">
			<div class="container text-center">
				<h1>Fixtures <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">Add</button></h1>
				<p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
			</div>
    </header>

    <section id="about">
      	<div class="container">
			<div class="row">
				<div class="flash-message">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						@if(Session::has('alert-' . $msg))

						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>

						@endif
					@endforeach
				</div>
			</div>
			@foreach ($dates as $date)
				<div class="card-body">
					<div class="card-header">
						{{ Carbon\Carbon::createFromFormat('d/m/Y', $date[0]->date)->format('l j F') }}
					</div>
					@foreach ($date as $fixture)
						<div class="fixture">
							<table class="table table-bordered">
								<tr class="row">
									<td class="col-lg-1">
										<p class="card-text">
											{{ Carbon\Carbon::createFromFormat('d/m/Y', $date[0]->date)->format('l j F') }} @ {{ $fixture->time_start }} <br>
											{{ $fixture->team1->group->name }} <br>
											{{ $fixture->pitch->name }}
										</p>
									</td>
									<td class="col-lg-5">
										<span style="font-size: calc(15px + (100vw - 1024px) / (1200 - 1024) * (21 - 18))">{{ $fixture->team1->name }}</span>
									</td>
									<td class="col-lg-1">
										<span style="font-size: calc(15px + (100vw - 1024px) / (1200 - 1024) * (21 - 18))">0 - 0</span>
									</td>
									<td class="col-lg-5">
										<span style="font-size: calc(15px + (100vw - 1024px) / (1200 - 1024) * (21 - 18))">{{ $fixture->team2->name }}</span>
									</td>
								</tr>
							</table>
						</div>
						<hr>
					@endforeach
				</div>
			@endforeach
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="flash-message">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						@if(Session::has('alert-' . $msg))

						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>

						@endif
					@endforeach
				</div>
			</div>

			@foreach ($dates as $date)
			<div class="card">
				<div class="card-header">
					{{ Carbon\Carbon::createFromFormat('d/m/Y', $date[0]->date)->format('l j F') }}
				</div>
				<div class="card-body">
					<h5 class="card-title"></h5>

				</div>
			</div>
			@endforeach
		</div>
	</section>


    <div class="modal" id="add" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Fixture</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
          	<div class="modal-body">
				<form action="{{ url()->current() }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="team1">Select Pitch</label>
					<select class="form-control" id="team1" name="pitch_id">
						@foreach ($pitches as $pitch)
							<option value="{{ $pitch->id }}">{{ $pitch->name }}</option>
						@endforeach
					</select>
				</div>
				<hr>
				<div class="form-group">
					<label for="team1">Team 1</label>
					<select class="form-control" id="team1" name="team_one_id">
						@foreach ($groups as $group)
							<optgroup label="{{ $group->name }}">
							@foreach ($group->teams as $team)
								<option value="{{ $team->id }}">{{ $team->name }}</option>
							@endforeach
							</optgroup>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="team2">Team 2</label>
					<select class="form-control" id="team2" name="team_two_id">
						@foreach ($groups as $group)
							<optgroup label="{{ $group->name }}">
							@foreach ($group->teams as $team)
								<option value="{{ $team->id }}">{{ $team->name }}</option>
							@endforeach
							</optgroup>
						@endforeach
					</select>
				</div>
				<hr>
				<div class="form-group">
					<label for="">Date</label>
					<div class="input-group date">
						<input type="text" name="date" class="datepicker form-control" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label for="">Match Start Time</label>
					<input type="text" class="form-control" name="time_start" placeholder="10:00pm">
				</div>
				<div class="form-group">
					<label for="">Match End Time</label>
					<input type="text" class="form-control" name="time_end" placeholder="12:00pm">
				</div>
          	</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</form>
			</div>
        </div>
      </div>
    </div>
	@include('partials.footer')
	<script>
		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy'
		});
	</script>
  </body>
</html>
