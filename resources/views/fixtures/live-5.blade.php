    <div class="container text-center" style="margin-bottom: 100px; margin-top: 100px;">
        <h2 class="title">Matches <button class="btn btn-danger btn-sm">LIVE</button></h2>
        @foreach ($fixtures as $fixture)
          <center>
            @if ($fixture->match_end == 1)
              <h6>FT</h6>
            @endif
            @if ($fixture->score !== null)
              <h5>{{ $fixture->team1->name }} | {{ $fixture->score->team_one }} - {{ $fixture->score->team_two }} | {{ $fixture->team2->name }}</h5>
            @else
              <h5>{{ $fixture->team1->name }} | 0 - 0 | {{ $fixture->team2->name }}</h5>
            @endif      
            <p>{{ $fixture->date }} | {{ $fixture->time_start }} - {{ $fixture->time_end }} | {{ $fixture->pitch->name }} | {{ $fixture->team1->group->name }}</p>
            <hr>
          </center>
        @endforeach
        <a href="fixtures" class="btn btn-success btn-lg">View All</a>
        
    </div>