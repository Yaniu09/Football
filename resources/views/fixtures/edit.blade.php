@extends('layouts.app')

@section('content')
    <header class="bg-primary text-white">
			<div class="container text-center">
				<h1>Fixtures</h1>
				<p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
			</div>
    </header>

	<section id="standings">
		<div class="container">
			<div class="container text-center">
				<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
		
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		
					@endif
				@endforeach
				</div>
				<h1>Add New Payers</h1>
			</div>
			<div class="row">
				<div class="col-lg-8 mx-auto">
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
										<option 
										@if ($fixtures->team_one_id == $team->id)
										selected
										@endif
										value="{{ $team->id }}">{{ $team->name }}</option>
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
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection