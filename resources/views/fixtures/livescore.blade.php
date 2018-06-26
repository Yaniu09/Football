@extends('layouts.app')

@section('content')
    <header class="bg-primary text-white">
			<div class="container text-center">
				<h1>Live Score</h1>
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
			</div>
			<div class="row">
				<div class="col-lg-10 mx-auto">
					<div class="col-lg-8 mx-auto">
						<form action="{{ url()->current() }}" method="POST">
							@csrf
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection