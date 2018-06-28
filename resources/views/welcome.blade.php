@extends('layouts.app')

@section('content')
  {{-- <header class="bg-dark text-white header"> --}}
    
      <img src="/img/BG.jpg" style="width:100%; height:350px">
    
  {{-- </header>  --}}

  <div class="card text-center" style="border-bottom:none;">
    <div class="card-header">
      <center>
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            <a class="nav-link active" href="#">Group Stage Fixtures</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Knockout Stage Fixtures</a>
          </li> --}}
        </ul>
      </center>
    </div>
    <div class="card-body">
        @foreach ($fixtures as $fixture)
          @if ($fixture->match_end == 1)
          <h6 class="card-title">FT</h6>
          @endif
          <h5 class="card-title">{{ $fixture->team1->name }} |  <span> {{ $fixture->score->team_one }} - {{ $fixture->score->team_two }} </span>  | {{ $fixture->team2->name }}</h5>
          <p class="card-text">{{ $fixture->date }} | {{ $fixture->time_start }} - {{ $fixture->time_end }} | {{ $fixture->pitch->name }}</p>
          <hr>
        @endforeach
    </div>
  </div>

  <section id="standings">
    
  </section>



@endsection

@section('js')
<script>
  $(function() {
    loadlink(); 
  });
  function loadlink(){
    $('#standings').load('standings/table',function () {
      $(this).unwrap();
    });
  }
  setInterval(function(){
    loadlink() 
  }, 5000);
</script>
@endsection