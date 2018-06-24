
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Thing</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

  </head>

  <body id="page-top">
    @include('partials.header')
    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Tournament Standings</h1>
        <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
      </div>
    </header>

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            @foreach ($groups as $group)
              <h3>{{ $group->name }}</h3>
              <table class="table table-sm table-dark">
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
                      <th scope="row">{{ $team->name }}</th>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    
    @include('partials.footer')
    

  </body>

</html>
