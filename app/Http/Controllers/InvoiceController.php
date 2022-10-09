<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoice_sub;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=0;
        $invoices = invoice::all();
        return view('all_invoices',['invoices'=>$invoices,'i'=>$i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $data = invoice::where('id',$id)->first();
        $inv_sub = invoice_sub::where('invoice_id',$id)->get();
        $inv_sum = invoice_sub::where('invoice_id',$id)->sum('total');
        $i=0;
      // share data to view
    //   view()->share('employee',$data);
      $pdf = app('dompdf.wrapper');

        $pdf->loadView('pdf_output',['inv_sum'=>$inv_sum,'inv_sub'=>$inv_sub,'invoices'=>$data,'i'=>$i])->setOptions(['defaultFont' => 'sans-serif']);
        $inv_nm = "invoice_".$data->customer_name."_".$data->created_at->format('Y-m-d').".pdf";
        return $pdf->stream($inv_nm);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
