<?php

namespace App\Http\Controllers;

use App\Models\addItem;
use App\Models\invoice;
use App\Models\invoice_sub;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class itemController extends Controller
{
    public function additem(Request $request){
        // dd($request->all());

        $inr = invoice::orderBy('id', 'DESC')->first();
        if($inr != null){
            $invoice_num = $inr->invoice_no +1;
        }else{
            $invoice_num = 1001;
        }

        $item_name = $request->item_name;
        $qty = $request->qty;
        $unit = $request->unit;
        $total = $request->total;
        if(empty($request->qty)){
            return redirect()->route('invoices.index');
        }
        $max=count($request->qty);

        
               
        $request->validate([
            'bname'=>'required',
            'address1'=>'required',
            'state'=>'required'
        ]);       

        $inv = new invoice;
        $inv->invoice_no = $invoice_num;
        $inv->customer_name = $request->bname;
        $inv->phone = $request->phn;
        $inv->address1 = $request->address1;
        $inv->address2 = $request->address2;
        $inv->state = $request->state;
        $inv->save();

        $inv_id = $inv->id;

        for($i=0;$i<$max;$i++){
            $inv_sub = new invoice_sub;
            $inv_sub->invoice_id = $inv_id;
            $inv_sub->item_name = $item_name[$i];
            $inv_sub->qty = $qty[$i];
            $inv_sub->price = $unit[$i];
            $inv_sub->total = $total[$i];
            $inv_sub->save();
        }



        return redirect()->route('invoices.show',$inv_id);
    }
    
}
