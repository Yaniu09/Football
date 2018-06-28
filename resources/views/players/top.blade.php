@extends('layouts.app')

@section('content')
  <header class="bg-dark text-white header">
		<div class="container text-center">
			<p class="lead"></p>
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
				<h1>Top Payers</h1>
			</div>
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<ul>
						@foreach ($goals as $goal)
							<li>Jersy {{ $goal->number }} - {{ $goal->name }} - Goals {{ $goal->goals }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>

@endsection