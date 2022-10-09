<!DOCTYPE html>
<html>
<head>
    <title>New Invoice Entry</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('/asset/css/home.css')  !!}" >
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
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
<div class="testbox">
    <form action="additem" name="item" id="item" method="post">
        @csrf
        <div class="banner" style="background:url({{asset('without_back_logo.png')}}) ;background-repeat: no-repeat;background-size: 50% 100%;">
            <h1>New Invoice Entry</h1>
        </div>


        <div class="colums">
            <div class="item">
                <label for="bname"> Bill To Name<span>*</span></label>
                <input id="bname" type="text" name="bname" required/>
            </div>
            <div class="item">
                <label for="phone"> Phone Number</label>
                <input id="phone" type="text" name="phn" />
            </div>
            <div class="item">
                <label for="address1">Address 1<span>*</span></label>
                <input id="address1" type="text"   name="address1" required/>
            </div>
            <div class="item">
                <label for="address2">Address 2</label>
                <input id="address2" type="text"   name="address2"/>
            </div>
            <div class="item">
                <label for="state">State<span>*</span></label>
                <input id="state" type="text"   name="state" required/>
            </div>
        </div>

        <div class="card-header m-5">
                        <h3 class="card-title">Product Details</h3>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="item">
                    <label for="item_name"> Item Name<span>*</span></label>
                    <input id="item_name" type="text" name="item_name" />
                </div>
            </div>
            <div class="col-6">
                <div class="item">
                    <label for="qty"> Quantity<span>*</span></label>
                    <input id="qty" type="number" name="qty" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="item">
                    <label for="unit"> Unit Price<span>*</span></label>
                    <input id="unit" type="number" name="unit" />
                </div>
            </div>
            <div class="col-6">
                <div class="item">
                    <label for="total"> Total<span>*</span></label>
                    <input id="total" type="text" value="0" name="total" readonly />
                </div>
            </div>
        </div>
        <button class="btn btn-primary" onclick="addToGrid()" type="button" >Add to grid</button>

        
        <div class="table-responsive ">
            <table class="table" id="grngrid">
                <thead>
                    <tr>
                        <th>sl.no</th>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="grngridbody">
                </tbody>
            </table>
        </div>

        <div class="btn-block">
            <button type="submit" >Save</button>
        </div>
    </form>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $('#unit').change(function(){
        var unit_price = $('#unit').val();
        var qty = $('#qty').val();

        if(unit_price != ''&& qty != '' ){
            var total = unit_price * qty;
            $('#total').val(total);
        }else{
            $('#total').val(0);
        }
    });
    $('#qty').change(function(){
        var unit_price = $('#unit').val();
        var qty = $('#qty').val();

        if(unit_price != ''&& qty != '' ){
            var total = unit_price * qty;
            $('#total').val(total);
        }else{
            $('#total').val(0);
        }
    });

    var Rows1 = 1;
    var SlNo1 = 1;
    function addToGrid(){

        var grid = document.getElementById('grngridbody');
        var lastRow = grid.rows.length;
        var Rows1 = lastRow + 1;
        var $tr = $("<tr></tr>");

        var item_name = $.trim($("#item_name").val()),
            unit = $.trim($("#unit").val()),
            qty = $.trim($("#qty").val()),
            total = $.trim($("#total").val());

        if (item_name == '') {
            alert("Please Enter Item Name")
            return false;
        } else if (unit == '') {
            alert("Please Enter Unit Price")
            return false;
        } else if (qty == '') {
            alert("Please Enter Quantity")
            return false;
        } else if (total == '') {
            alert("Total price is null")
            return false;
        }

        var allitem_name = document.getElementsByName('item_name[]');
        var allunit = document.getElementsByName('unit[]');
        var allqty = document.getElementsByName('qty[]');
        var alltotal = document.getElementsByName('total[]');

        for (i = 0; i < allitem_name.length; i++) {
            if ((item_name == allitem_name[i].value) && (unit == allunit[i].value) && (qty == allqty[i].value) && (total == alltotal[i].value)) {
                alert("Item already added");
                return false;
            }
        }

        var grid = document.getElementById('grngridbody');
        var lastRow = grid.rows.length;
        var iteration = lastRow;

        var row = grid.insertRow(lastRow);
        row.setAttribute('id', 'row' + Rows1);
        lastRow++;

        // first cell
        var cellLeft = row.insertCell(0);
        var textNode = document.createTextNode('');
        cellLeft.appendChild(textNode);
        cellLeft.innerHTML = Rows1;

        // second cell 
        var cell1 = row.insertCell(1);
        var textNode = document.createTextNode('');
        cell1.appendChild(textNode);
        cell1.align = "left";
        cell1.innerHTML = item_name;

        // Third cell 
        var cell2 = row.insertCell(2);
        var textNode = document.createTextNode('');
        cell2.appendChild(textNode);
        cell2.align = "left";
        cell2.innerHTML = unit;

        // Fourth cell 
        var cell2 = row.insertCell(3);
        var textNode = document.createTextNode('');
        cell2.appendChild(textNode);
        cell2.align = "left";
        cell2.innerHTML = qty;

        // Fifth cell 
        var cell3 = row.insertCell(4);
        var textNode = document.createTextNode('');
        cell3.appendChild(textNode);
        cell3.align = "left";
        cell3.innerHTML = total;

        // Sixth cell 
        var cellRight = row.insertCell(5);
        var textNode = document.createTextNode('');
        cellRight.appendChild(textNode);
        cellRight.align = "left";
        cellRight.innerHTML = "<a href='#' id='deleterow' onclick='deleterow(\"row" + Rows1 + "\"," + SlNo1 + ")'>" +
            "<i class='fa fa-trash'></i>" +

            "</a><input type='hidden' name='item_name[]'  value='" + item_name + "'>" +
            "</a><input type='hidden' name='unit[]'  value='" + unit + "'>" +
            "</a><input type='hidden' name='qty[]'  value='" + qty + "'>" +
            "<input type='hidden' name='total[]'  value='" + total + "'>";
        
        rowreset();
        document.getElementById("count").value=SlNo1;
        Rows1++;
        SlNo1++;
    }
    function deleterow(id, slno)
    {
        if (confirm("Are you sure you want to delete this Item?"))
        {
            var r = document.getElementById(id);
            r.parentNode.removeChild(r);
            var tbl = document.getElementById('grngrid');
            var lastRow = tbl.rows.length;
            for (i = 1; i < lastRow; i++)
            {
                r = document.getElementById('grngrid').rows[i];
                r.cells[0].innerHTML = i;
                document.getElementById("count").value=i;
            } 
            SlNo1--;
            Rows1--;            
        }
    }
    function rowreset(){
          $("#item_name").val("").change();
          $("#unit").val("").change();
          $("#qty").val("").change();
          $("#total").val("").change();

      }
</script>

