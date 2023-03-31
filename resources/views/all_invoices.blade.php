@extends('common')

@section('section')
<div class="testbox">
    <form action="additem" name="item" id="item" method="post">
        @csrf
        <div class="banner tab-content" style="background:url({{asset('without_back_logo.png')}}) ;background-repeat: no-repeat;background-size: 50% 100%;">
            <h1 class="font-effect-outline">Invoice Lists</h1>
        </div>
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

    </form>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection