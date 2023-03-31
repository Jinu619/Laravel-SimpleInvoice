<!DOCTYPE html>
<html>
<head>
    <title>Invoices</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('asset/css/home.css')}}" >
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- ###########################################################################################
     ###########################################################################################
     #######                        Create  BY Ginu                                     ########
     ###########################################################################################
     ########################################################################################### -->
      
</head>
<body style="background-color: #fde4da;">
<nav class="navbar navbar-expand-lg bg-light">
  <div class="box container-fluid">
    <a class="navbar-brand" href="#"><i class="far fa-user-circle"></i>&nbsp;{{auth()->user()->name}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link btn btn-primary" aria-current="page" href="{{route('invoices.index')}}"><font color="white">Home</font></a>
        </li>&nbsp;
        <li class="nav-item">
          <a class="nav-link btn btn-success ml-5" href="{{route('addinvoice')}}"><font color="white">New Invoice</font></a>
        </li>
      </ul>
    </div>
    <ul class="d-flex navbar-nav" >
        <li class="nav-item">
          <a class="nav-link btn btn-danger" href="{{route('logout')}}"><i class="fas fa-sign-in-alt"></i> Logout</a>
        </li>
        
    </ul>
  </div>
</nav>
@yield('section')