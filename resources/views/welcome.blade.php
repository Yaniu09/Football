@extends('layouts.app')

@section('content')
  {{-- <header class="bg-dark text-white header"> --}}
    
      <img src="/img/banner.png" style="width:100%;">
    
  {{-- </header>  --}}
  <section>
    <div class="conatiner">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="card border-dark mb-3" style="">
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
                <div class="row">
                    <h5 class="card-title text-right">{{ $fixture->team1->name }}</h5>
                  </div>
                  <div class="col-md-2">
                    <h5 class="card-title text-center">| {{ $fixture->score->team_one }} - {{ $fixture->score->team_two }} |</h5>
                  </div>
                  <div class="col-md-3">
                    <h5 class="card-title">{{ $fixture->team2->name }}</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 mx-auto">
                    <p class="card-text">{{ $fixture->date }} | {{ $fixture->time_start }} - {{ $fixture->time_end }} | {{ $fixture->pitch->name }}</p>
                  </div>
                </div>
                <hr>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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