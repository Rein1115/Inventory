<?php

namespace App\Http\Controllers\salesreport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesRepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [];

        try{    
            $response = Auth::check() ? 
            DB::select("select  MONTHNAME(date) AS month, YEAR(date) AS year
            from orders
            where upaid = 1
            group by year, month;")
            : [];
            
        }catch(\Exception $e){
            $response = $e->getMessage();
        }
        return view('salesrep.salesreport',compact('response'));
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
        //
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

    public function displaySyear($id){
        $response = [];
        $totalamount = [];

        try{
            $response = Auth::check() ? 
            DB::select("select p.product_name as product_name, MONTHNAME(o.date) AS month, SUM(o.totalamount) as totalamount, SUM(o.quantity) as quantity
            from orders as o
            inner join products as p on p.product_id = o.product_Id
            where MONTHNAME(o.date) = '$id' and  o.upaid = 1
            group by product_name , month;")
             : []; 

            $totalamount = Auth::check()? DB::select("select SUM(totalamount) as sumtotalamount from orders where MONTHNAME(date) = '$id' and upaid = 1; ") : [];
        }catch(\Exception $e){
            $response = $e->getMessage();
        }
// dd($response,$totalamount);
        return view('salesrep.salesview',compact('response','totalamount'));
    }
}
