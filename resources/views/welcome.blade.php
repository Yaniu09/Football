@extends('layouts.app')

@section('content')
  
  <section id="matches">
    
  </section>

  <section id="standings">
    
  </section>

  <section id="about">
    <div class="container text-center" style="margin-bottom: 100px; margin-top: 100px;">
      <h2 class="title">About Us</h2>
      <p>Metro Fustsal Cup is an annual futsal tournament organized by Metro Fitness Group to promote unity amongst the youth. The tournament is a youth-led platform which aims to use futsal as a tool to promote the values of unity, reconciliation and encourage development among youth with the goal to lead a healthy lifestyle. Metro Fitness Group has also been proative in spreading messages of unity by encouraging youth to gain a better understanding of others and respect their peers.</p>
      <hr>
      <h3 class="">Main Sponsor</h2>
      <center><img width="100%" src="/a.png"></center>
      <br>
      <hr>
      <h3 class="">Other Sponsors</h2>
      <img src="/img/Sponsor.png" width="100%">
      <br>
      <center>
      <img src="/b.png" width="75" height="75">
      </center>
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
    $('#matches').load('fixtures/live-5',function () {
      $(this).unwrap();
    });
  }
  setInterval(function(){
    loadlink() 
  }, 5000);
</script>
@endsection