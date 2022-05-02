<!DOCTYPE html>
<html>
<head>
    <title>Laravel Article Application</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset ('CSS/bootstrap/bootstrap.min.css')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  
<div class="container">
    @yield('content')
</div>
   
</body>
</html>