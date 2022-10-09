<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    * { font-family: DejaVu Sans, sans-serif;font-size: 12px; }
    #invoice{
        padding: 30px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,.invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }
    

    @media print {
        .invoice {
            font-size: 11px!important;
            overflow: hidden!important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }
</style>
<body>


<div id="invoice">

    <div class="toolbar hidden-print">

        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col"><img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('without_back_logo.png')))}}"  style="width: 150px; height: 100px;"  />
                    
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                                WakkaBen
                        
                        </h2>
                        <div>97782 ***** </div>
                         <div>97782 *****</div>
                        <div>wakkaben@gmail.com</div>
                    </div>
                </div>
            </header>
            <!-- <main style="background-image: url(data:image/png;base64,{{base64_encode(file_get_contents(public_path('without_back_logo.png')))}});background-repeat: no-repeat;
  background-size: 100% 100%;opacity:0.3;"> -->
            <main>
                <div class="row contacts opacity"> 
                    <div class="col invoice-to">
                        <div class="text-gray-light" style="color:#055f73">INVOICE TO:</div>
                        <h2 class="to">{{$invoices->customer_name}}</h2>
                        <div class="address">{{$invoices->phone}}</div>
                        <div class="address">{{$invoices->address1}}</div>
                        <div class="address">{{$invoices->address2}}</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id" style="color:#055f73">INVOICE</h1>
                        <div class="date">Invoice No: INV{{$invoices->invoice_no}}</div>
                        <div class="date">Invoice Date: {{$invoices->created_at->format('Y-m-d')}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>Sl/No</th>
                        <th class="text-left">ITEM NAME</th>
                        <th class="text-right">QUANTITY</th>
                        <th class="text-right">UNIT PRICE</th>
                        <th class="text-right">TOTAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($inv_sub as $in)
                        <tr>
                            <td class="no" style="background-color:#ffe4d9"><font color="black">{{++$i}}</font></td>
                            <td class="text-left">{{$in->item_name}} </td>
                            <td class="unit">&#8377;{{$in->price}}</td>
                            <td class="qty">{{$in->qty}}</td>
                            <td class="total" style="background-color:#ffe4d9;"><font color="black">&#8377;{{$in->total}}</font></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2" style="color:#055f73">SUBTOTAL</td>
                        <td style="color:#055f73">&#8377;{{$inv_sum}}</td>
                    </tr>
                    </tfoot>
                </table>

                <div class="notices" >
                    <div>Thank You</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>

        <div></div>
    </div>
</div>
</body>
</html>