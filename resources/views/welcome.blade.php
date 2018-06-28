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
        <h6 class="card-title">FT</h6>
        <h5 class="card-title">{{ $fixture->team1->name }} |  <span> 0 - 0 </span>  | {{ $fixture->team2->name }}</h5>
        <p class="card-text">{{ $fixture->date }} | {{ $fixture->time_start }} - {{ $fixture->time_end }} | {{ $fixture->pitch->name }}</p>
        <hr>
        @endforeach
    </div>
  </div>

  <section id="standings">
<<<<<<< HEAD
    
=======
    <div class="container">
        <div class="container text-center">
        <h1>Tournament Standings</h1>
        </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          @foreach ($groups as $group)
            <h3>{{ $group->name }}</h3>
            <table class="table table-sm ">
              <thead>
                <tr>
                  <th scope="col">Team</th>
                  <th scope="col">MP</th>
                  <th scope="col">GF</th>
                  <th scope="col">GA</th>
                  <th scope="col">GD</th>
                  <th scope="col">Pts</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($group->teams as $team)
                  <tr>
                    <th scope="row" style="font-weight:normal;">{{ $team->name }}</th>
                    <td>{{ $team->standing->mp }}</td>
                    <td>{{ $team->standing->gf }}</td>
                    <td>{{ $team->standing->ga }}</td>
                    <td>{{ $team->standing->gd }}</td>
                    <td>{{ $team->standing->pts }}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          @endforeach
        </div>
      </div>
    </div>
>>>>>>> cb7d765f5c02cacde8f6c3eaece9a2f3164b00a8
  </section>



@endsection

@section('js')
<script>
  $(function() {
    loadlink(); 
    setInterval(function(){
      loadlink() 
    }, 5000);
  });
  function loadlink(){
    $('#links').load('standings/table',function () {
      $(this).unwrap();
    });
  }
</script>
@endsection