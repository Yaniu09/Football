@extends('layouts.app')

@section('content')
  
  <section id="matches">
    
  </section>

  <section id="standings">
    
  </section>

  {{-- <section id="about">
    <div class="container text-center" style="margin-bottom: 100px; margin-top: 100px;">
      <h2 class="title">About Us</h2>
      
    </div>
  </section> --}}
  

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
    $('#matches').load('fixtures/live-5',function () {
      $(this).unwrap();
    });
  }
  setInterval(function(){
    loadlink() 
  }, 5000);
</script>
@endsection