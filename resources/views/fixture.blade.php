@extends('layouts.app')

@section('css')
	<link href="/css/fixture.css" rel="stylesheet">
@endsection

@section('content')
	
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
		</div>
		<div class="container text-center">
			<h1 class="title">Fixtures 
				@if (Auth::check())
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">Add</button>
				@endif
			</h1>
			
			@foreach ($dates as $date)
				<h3>{{ Carbon\Carbon::createFromFormat('d/m/Y', $date[0]->date)->format('l j F') }}</h3>
				<hr>
				<br>
				@foreach ($date as $fixture)
				<center>
					@if (Auth::check())
					<a href="/live-score/{{ $fixture->id }}">
					@endif
						@if ($fixture->match_end == 1)
						<h6>FT</h6>
						@endif
						@if ($fixture->score !== null)
							<h5>{{ $fixture->team1->name }} | {{ $fixture->score->team_one }} - {{ $fixture->score->team_two }} | {{ $fixture->team2->name }}</h5>
						@else
							<h5>{{ $fixture->team1->name }} | 0 - 0 | {{ $fixture->team2->name }}</h5>
						@endif
						<p>{{ $fixture->date }} | {{ $fixture->time_start }} - {{ $fixture->time_end }} | {{ $fixture->pitch->name }}</p>
					@if (Auth::check())
					</a>
					@endif
				</center>
				@endforeach
				<hr>
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
@endsection

@section('js')
	<script>
		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy'
		});

		jQuery(document).ready(function($) {
			$(".clickable-row").click(function() {
				window.location = $(this).data("href");
			});
		});
	</script>
@endsection