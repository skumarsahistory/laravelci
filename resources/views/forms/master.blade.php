<!-- master.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    
    @section('sidebar')
    <div class="sidebar">
      test
    </div>
    @show

    <div class="container">
      @yield('maincontent')
    </div>

    
  </body>
</html>