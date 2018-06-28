@extends('layouts.app')

@section('content')
  <header class="bg-dark text-white header">
    <div class="container text-center">
      <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
    </div>
  </header> 

  <div class="card text-center">
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