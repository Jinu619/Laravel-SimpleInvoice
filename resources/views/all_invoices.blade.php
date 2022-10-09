<!DOCTYPE html>
<html>
<head>
    <title>Invoices</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('/asset/css/home.css')  !!}" >
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body >
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{auth()->user()->name}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('invoices.index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('addinvoice')}}">Add Invoice</a>
        </li>
      </ul>
    </div>
    <ul class="d-flex navbar-nav" >
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
    </ul>
  </div>
</nav>
<div class="banner" style="background:url({{asset('without_back_logo.png')}}) ;background-repeat: no-repeat;background-size: 50% 100%;">
            <h1>Invoice List</h1>
        </div>

<div class="card card-body">

    <table class="table table-dark table-striped">
        <tr>
            <th>sl/no</th>
            <th>Invoice Number</th>
            <th>customer_name</th>
            <th>phone</th>
            <th>created Date</th>
            <th>Action</th>
        </tr>
        @foreach ($invoices as $inv)
            <tr>
                <td>{{++$i}}</td>
                <td>INV{{$inv->invoice_no}}</td>
                <td>{{$inv->customer_name}}</td>
                <td>{{$inv->phone}}</td>
                <td>{{$inv->created_at}}</td>
                <td><a href="{{route('invoices.show',$inv->id)}}" target="_blank">Print</a></td>
            </tr>
        @endforeach
    </table>
    </div>
</body>
</html>