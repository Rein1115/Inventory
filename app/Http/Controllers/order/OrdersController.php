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
        $response  =   Auth::check() ?  
            DB::SELECT('
            select o.deliveredto, p.product_name, p.price ,o.deliveredby, o.order_id
            FROM `orders` AS o 
            Inner join `products` AS p ON o.product_Id = p.product_id;
            ') : [];

        $productlist = Auth::check() ? 
        DB::SELECT('select * from products where status = 0') : [];
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }
  
        return view('orders.orderslist',compact('response'));
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

        $request->validate([
            "productname" => "required",
            "deliveredto" => "required",
            "address" => "required",
            "date" => "required",
            "quantity" => "required",
            "terms" => "required",
            "po" => "required",
            "deliveredby" => "required"
        ]);

        // return $request;
        // try{
        //     $validate = Auth::check() ?
        //     $request->validate([
        //         "productname" => "required",
        //         "delivered" => "required",
        //         "address" => "required",
        //         "date" => "required",
        //         "quantity" => "required",
        //         "terms" => "required",
        //         "po" => "required",
        //         "deliveredby" => "required"
        //     ])
        //     : [];

            
        //     DB::table('orders')->insert([
        //         "product_name" => $validate['productname'],
        //         "quantity" => $validate['quantity'],
        //         "price" => number_format($validate['price'], 2, '.', ''),
        //         "expiration" => $validate['expiration'],
        //     ]);

        //     return response()->json(['status' => true , 'message' => 'Product Inserted Successfully']);

        // }catch(\Exception $e){
        //     return response()->json(['status' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        // }    
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
}
