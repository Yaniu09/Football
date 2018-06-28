@extends('layouts.app')

@section('content')
  
  <section id="matches">
    <div class="container text-center" style="margin-bottom: 100px; margin-top: 100px;">
      <h2 class="title">Matches</h2>
      @foreach ($fixtures as $fixture)
        <center>
          @if ($fixture->match_end == 1)
            <h6>FT</h6>
          @endif
          <h5>{{ $fixture->team1->name }} | {{ $fixture->score->team_one }} - {{ $fixture->score->team_two }} | {{ $fixture->team2->name }}</h5>
          <p>{{ $fixture->date }} | {{ $fixture->time_start }} - {{ $fixture->time_end }} | {{ $fixture->pitch->name }}</p>
          <hr>
        </center>
      @endforeach
    </div>
  </section>

  <section id="standings">
    
  </section>

  <section id="about">
    <div class="container text-center" style="margin-bottom: 100px; margin-top: 100px;">
      <h2 class="title">About Us</h2>
      
    </div>
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