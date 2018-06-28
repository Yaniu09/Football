<div class="container text-center">
        <h1 class="title">Fixtures 
            <button class="btn btn-danger btn-sm">LIVE</button>
            @if (Auth::check())
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">Add</button>
            @endif
        </h1>
        
        @foreach ($dates as $date)
            <h3>{{ Carbon\Carbon::createFromFormat('d/m/Y', $date[0]->date)->format('l j F') }}</h3>
            <hr>
            <br>
            @foreach ($date as $fixture)
            <center>
                @if (Auth::check())
                <a href="/live-score/{{ $fixture->id }}" onclick="return confirm('Are you sure you would like to start the match.This would change the standings(MP) of both teams This process cannot be reversed.')">
                @endif
                    @if ($fixture->match_end == 1)
                    <h6>FT</h6>
                    @endif
                    @if ($fixture->score !== null)
                        <h5>{{ $fixture->team1->name }} | {{ $fixture->score->team_one }} - {{ $fixture->score->team_two }} | {{ $fixture->team2->name }}</h5>
                    @else
                        <h5>{{ $fixture->team1->name }} | 0 - 0 | {{ $fixture->team2->name }}</h5>
                    @endif
                    <p>{{ $fixture->date }} | {{ $fixture->time_start }} - {{ $fixture->time_end }} | {{ $fixture->pitch->name }} | {{ $fixture->team1->group->name }}</p>
                @if (Auth::check())
                </a>
                @endif
            </center>
            @endforeach
            <hr>
        @endforeach
        
    </div>