@extends('layouts.app')

@section('content')
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
				<h1 class="title">Live Score</h1>
			</div>
			<div class="row">
				<div class="col-lg-12 mx-auto">
					<table class="table">
						<thead>
							<tr>
								<th>{{ $fixture->team1->name }} - Score: {{ $score->team_one }}</th>
								<th>{{ $fixture->team2->name }} - Score: {{ $score->team_two }}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									@foreach($fixture->team1->players as $player)
										{{ $player->number }} - {{ $player->name }} 
										<a class="btn btn-success btn-sm"  href="{{ url()->current() }}/add-goal/{{ $player->id }}/1" onclick="return confirm('Are you sure you would like to add a goal. This process cannot be reversed.')">Goal ({{ $player->goals }})</a> 
										<a class="btn btn-warning btn-sm" href="{{ url()->current() }}/add-yellow/{{ $player->id }}/1" onclick="return confirm('Are you sure you would like to add a yellow card. This process cannot be reversed.')">Yellow Card ({{ $player->yellow }})</a> 
										<a class="btn btn-danger btn-sm" href="{{ url()->current() }}/add-red/{{ $player->id }}/1" onclick="return confirm('Are you sure you would like to add a red card. This process cannot be reversed.')">Red Card ({{ $player->red }})</a>
										<br>
										<br>
									@endforeach
								</td>
								<td>
									@foreach($fixture->team2->players as $player)
										{{ $player->number }} - {{ $player->name }} 
										<a class="btn btn-success btn-sm" href="{{ url()->current() }}/add-goal/{{ $player->id }}/2" onclick="return confirm('Are you sure you would like to add a goal. This process cannot be reversed.')">Goal ({{ $player->goals }})</a> 
										<a class="btn btn-warning btn-sm" href="{{ url()->current() }}/add-yellow/{{ $player->id }}/2"  onclick="return confirm('Are you sure you would like to add a yellow card. This process cannot be reversed.')">Yellow Card ({{ $player->yellow }})</a> 
										<a class="btn btn-danger btn-sm" href="{{ url()->current() }}/add-red/{{ $player->id }}/2" onclick="return confirm('Are you sure you would like to add a red card. This process cannot be reversed.')">Red Card ({{ $player->red }})</a>
										<br>
										<br>
									@endforeach
								</td>
							</tr>
						</tbody>
					</table>
					<hr>
					<a class="btn btn-block btn-warning" href="{{ url()->current() }}/{{ $score->id }}/finish-match">End Match</a>
				</div>
			</div>
		</div>
	</section>

@endsection