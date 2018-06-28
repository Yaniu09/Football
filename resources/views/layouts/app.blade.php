<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>METRO FUTSAL CUP</title>
    <style>
    .content {
      min-height: 500px;
      padding-top: 100px;
      padding-bottom: 100px;
    }
    .title {
      margin-bottom: 50px;
    }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/lux/bootstrap.min.css" rel="stylesheet">

  </head>

  <body id="page-top">
    @include('partials.header')
    
    <div class="content">
    @yield('content')
    </div>

    @include('partials.footer')
    
    @yield('js')
  </body>

</html>
