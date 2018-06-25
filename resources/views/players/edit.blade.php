@extends('layouts.app')

@section('content')
  <header class="bg-dark text-white header">
    <div class="container text-center">
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
          <form method="POST" enctype="multipart/form-data" action="{{ url('/players') }}">
          {{ csrf_field() }}
          <label for="title">Select</label>
          <select class="form-control" id="team1" name="team_id">
						@foreach ($groups as $group)
							<optgroup label="{{ $group->name }}">
							@foreach ($group->teams as $team)
								<option value="{{ $team->id }}">{{ $team->name }}</option>
							@endforeach
							</optgroup>
						@endforeach
					</select>
            <div class="form-group">
              <label for="title">Full Name</label>
              <input type="text" value="{{ $players->name }}" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="title">Jersy Number</label>
              <input type="text" class="form-control" id="number" name="number">
            </div>
            <select name="position" >
            <option value="GK">GK</option>
            <option value="DF">DF</option>
            <option value="MD">MD</option>
            <option value="AT">AT</option>
            </select>
             <div class="form-group">
              <label for="title">Yellow Cards</label>
              <input type="text" class="form-control" id="yellow" name="yellow">
            </div>
             <div class="form-group">
              <label for="title">Red Cards</label>
              <input type="text" class="form-control" id="red" name="red">
            </div>
             <div class="form-group">
              <label for="title">Goals Scored</label>
              <input type="text" class="form-control" id="goals" name="goals">
            </div>
             <div class="form-group">
              <label for="title">Assists Scored</label>
              <input type="text" class="form-control" id="assists" name="assists">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection