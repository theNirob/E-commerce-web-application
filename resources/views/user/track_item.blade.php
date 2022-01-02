<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Headers · Bootstrap v5.1</title>

<link rel="canonical" href="{{ asset('css/headers.css') }}">
<link rel="canonical" href="{{ asset('css/navbar.css') }}">



<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>
<body>

<header class="p-3 bg-dark text-white">
<div class="container">
  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use/></svg> <h2>E DEAL</h2>
    </a>

    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    
    </ul>

    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
      <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
    </form>

    <div class="text-end">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">

              @if (Route::has('login'))
                
                    @auth
                    <li class="nav-item">
                <a class="nav-link" href="{{url('showcart')}}">
                <i class="fal fa-shopping-cart"></i>
                  Cart[{{$count}}]</a>
              </li>

                        <x-app-layout>

                        </x-app-layout>
                        
                    @else
                        <li><a class="nav-link" href="{{ route('login') }}" >Log in</a><li>

                        @if (Route::has('register'))
                            <li><a class="nav-link" href="{{ route('register') }}" >Register</a><li>
                        @endif
                    @endauth
                
            @endif
            <li>




            </ul>
          </div>
        
      </nav>
      </div>
  </div>

  <?php
  echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
  
  class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
      parent::__construct($it, self::LEAVES_ONLY);
    }
  
    function current() {
      return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }
  
    function beginChildren() {
      echo "<tr>";
    }
  
    function endChildren() {
      echo "</tr>" . "\n";
    }
  }
  
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "ecommerce";
  ?>


</body>
</html>