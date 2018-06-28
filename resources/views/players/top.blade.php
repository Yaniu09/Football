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
				<h1 class="title">Top Scorers</h1>
			</div>
			<div class="row">
				<div class="col-lg-8 mx-auto">
						<div class="card text-center">
							<div class="card-header">
								Top 10
							</div>
							<div class="card-body">
								@foreach ($goals as $goal)
									<h5 class="card-title">	
										{{ $goal->number }} - {{ $goal->name }} - {{ $goal->team->name }}
									</h5>
									<p class="card-text">Goals {{ $goal->goals }}</p>
									<hr>
								@endforeach
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>

@endsection