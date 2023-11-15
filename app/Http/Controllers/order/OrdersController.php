<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [];
        $productlist = [];
        try{
            $response = Auth::check() ?
            DB::select('
                SELECT o.deliveredto, MIN(p.product_name) AS product_name, MIN(p.price) AS price, MIN(o.deliveredby) AS deliveredby, MIN(o.order_id) AS order_id
                FROM orders AS o 
                INNER JOIN products AS p ON o.product_Id = p.product_id
                GROUP BY o.deliveredto;
            ') : [];

        }        
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }
        // dd($response);
  
        return view('orders.orderslist',compact('response','productlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = [];
        $productlist = [];
        return view('orders.ordersdetails',compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validate = Auth::check() ?
            $request->validate([
                "product_id" => "required",
                "deliveredto" => "required",
                "address" => "required",
                "date" => "required",
                "quantity" => "required",
                "terms" => "required",
                "po" => "required",
                "deliveredby" => "required",
                "totalamount" => "required",
                "u/p" => "required"
            ])
            : [];




            DB::table('orders')
            ->insert([
                "product_Id" => $validate['product_id'],
                "deliveredto" => $validate['deliveredto'],
                "address" => $validate['address'],
                "date" => $validate['date'],
                "quantity" => $validate['quantity'],
                "totalamount" => $validate['totalamount'],
                "terms" => $validate['terms'],
                "po" => $validate['po'],
                "deliveredby" => $validate['deliveredby'],
                "upaid" => $validate['u/p']
            ]);

            $quantity = DB::table('products')
            ->where('product_id', $validate['product_id'])
            ->value('quantity'); 

            $quan = $validate['quantity'];
            $productId = $validate['product_id'];

            $quant = DB::select("select quantity from products where product_id = $quan ");
        
        if ($quant !== null) {
            $newQuantity = $quantity - $quan;
    
            DB::select("update products set quantity = $newQuantity where product_id = $productId");
            
            return response()->json(['status' => true , 'message' => 'Product Inserted Successfully']);
        }
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = [];
        $productlist = [];
            try {
                $response = Auth::check() ? 
                DB::table('orders')->where('order_id', $id)->get()
                : [];
                
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }

            return view('orders.ordersdetails',compact('response','productlist') );
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

    public function productOrder($id){
        $productlist = [];
        $response = [];

        try {
            $productlist = Auth::check() ? 
            DB::table('products')->where('product_id', $id)->get()
            : [];
            
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }
        return view('orders.ordersdetails',compact('response','productlist') );

    }


    public function viewSummary($id){
        $productlist = [];
        $response = [];

        try {
            $response = Auth::check() ? 
            DB::select("
                select 
                    p.product_name as product_name, 
                    p.price as price, 
                    o.deliveredto as deliveredto,
                    o.address as address, 
                    o.date as date, 
                    o.quantity as quantity, 
                    o.totalamount as totalamount , 
                    o.terms as terms,
                    o.po as po, 
                    o.deliveredby as deliveredby , 
                    o.upaid as upaid , 
                    o.order_id as order_id
                from 
                    orders as o
                inner join 
                    products as p ON p.product_id = o.product_id
                where 
                    o.deliveredto = :id", ['id' => $id])
            : [];
           
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }

        return view('orders.ordersummary',compact('response','productlist') );
    }

    public function printOrder($id){
        $productlist = [];
        $response = [];


        try{
            $response = Auth::check() ? 
            DB::select("select
                 o.order_id as order_id,
                 p.product_id as product_id,
                 p.product_name as product_name, 
                 o.deliveredto as deliveredto,
                 o.address as address, 
                 o.date as date, 
                 o.quantity as quantity, 
                 o.totalamount as totalamount,
                 o.terms as terms,
                o.po as po, 
                o.deliveredby as deliveredby, 
                o.upaid as upaid
                from orders as o
                inner join products as p on p.product_id = o.product_Id
                where o.order_id = :id", ['id' => $id]
                ) : [];
            return response()->json(['status' => true, 'data' => $response]);
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => $e]);
        }

    }


}
