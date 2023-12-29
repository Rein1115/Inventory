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
                GROUP BY 
                o.deliveredto;
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
                "u/p" => "required",
                "doctor_name" => "required",
                "contact_num" => "required",
                "or" => "required",
                "cr" => "required",
                "collected_by" => "required",
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
                "doctor_name" => $validate['collected_by'],
                "contact_num" => $validate['contact_num'],
                "or" => $validate['or'],
                "cr" => $validate['cr'],
                "collected_by" => $validate['collected_by'],
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
                    o.or ,  DATE(o.created_at) AS order_date
                from 
                    orders as o
                where 
                    o.deliveredto = :id
                GROUP BY o.or,DATE(o.created_at) ", ['id' => $id])
            : [];
        
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }
        // dd($response);
        return view('orders.ordersummary',compact('response','productlist') );
    }


    public function updateQuan(Request $request, $id)
    {
        try {
            $validate = Auth::check() ? $request->validate([
                'upquan' => 'required',
                'delorder' => 'required'
            ]) : [];

            $addquan = DB::select("select quantity from products where product_id = :id", ["id" => $id]);

            $currentQuantity = isset($addquan[0]->quantity) ? $addquan[0]->quantity : 0;

            $quanA = $validate['upquan'] + $currentQuantity;

            DB::update("update products set quantity = :quantity where product_id = :id", [
                'quantity' => $quanA,
                'id' => $id,
            ]);

            DB::select("delete from orders where order_id = :id", ['id' => $validate['delorder']]);

            return response()->json(['status' => true, 'message' => 'Updated product quantity and deleted order successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function printOrder($id){
        $productlist = [];
        $response = [];
        try{
            
            $response = Auth::check() ? 
            DB::select("
                SELECT
                    MIN(p.product_id) as product_id,
                    GROUP_CONCAT(p.product_id) as product_ids,
                    GROUP_CONCAT(p.price) as product_price,
                    GROUP_CONCAT(o.order_id) as order_id,
                    MIN(o.order_id) as order_id,
                    GROUP_CONCAT(o.order_id) as order_ids,
                    MIN(p.product_id) as product_id,
                    GROUP_CONCAT(p.product_name) as product_names,
                    o.deliveredto as deliveredto,
                    o.address as address,
                    MIN(o.date) as date,
                    o.or,
                    GROUP_CONCAT(o.quantity) as quantity,
                    SUM(o.totalamount) as totalamount,
                    MIN(o.terms) as terms,
                    MIN(o.po) as po,
                    MIN(o.deliveredby) as deliveredby,
                    MIN(o.upaid) as upaid
                FROM 
                    orders AS o
                INNER JOIN 
                    products AS p ON p.product_id = o.product_Id
                WHERE 
                    o.or = :id
                GROUP BY 
                    o.address,
                    o.deliveredto,
                    o.or
            ", ['id' => $id]) : [];
        
            $payments = Auth::check() ? DB::select('SELECT * FROM payments WHERE or_numbers = :id', ['id' => $id]) : [];

            $paymentsval = null;
          

            foreach($payments as $item){
                $paymentsval = $item->payment;
            }
                // dd($response,$paymentsval);
            // return response()->json(['status' => true, 'data' => $response]);
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }

        // return $response;
        return view('orders.ordersindiview',compact('response','paymentsval'));
    }

    public function paymentUpdate(Request $request, $id){
        $response = [];

        try{
            $validate = Auth::check() ? $request->validate([
                'updatepay' =>'required'
            ]) : [];
            
            DB::select("update orders set upaid = :updatepay where order_id = :id",['updatepay' => $validate['updatepay'] , 'id' => $id]);
            
            return response()->json(['status' => true, 'message' => 'This order is already paid']);
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }

    }

    public function paymentreaming(Request $request){

        try{
            $validate = Auth::check() ?
            $request->validate([
                "or"=>"required",
                "orderid" => "required",
                "paymentmode"=>"required",
                "crenumber"=>"nullable",
                "payment" =>"required",
                "amount" => "required",
            ])
            : [];
            $minusp = $validate['payment'] - $validate['amount'];
            if ($validate['payment'] >= $validate['amount']) {
                DB::table('payments')
                ->insert([
                    "or_numbers" => $validate['or'],
                    "order_id" => $validate['orderid'],
                    "paymentmode" => $validate['paymentmode'],
                    "number" => $validate['crenumber'],
                    "amount" => $validate['amount'],
                    "payment" => $minusp,
                ]);
    
                return response()->json(['status' => true , 'message' => 'Payment Inserted Successfully']);
    
            } else {
                return response()->json(['status' => false, 'message' => 'Payment is greater than the amount.']);
            }

           

        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        } 
    }

    public function editquantity(Request $request){
        try{
            $validate = Auth::check() ?
            $request->validate([
                "order_id"=>"required",
                "quantity" => "required",
                "product_id" => "required"
            ])
            : [];

            $productId =DB::select("SELECT quantity FROM products WHERE product_id = :product_id", ['product_id' => $validate['product_id']]);
            $availableQuantity = $productId[0]->quantity;
            $minus = $availableQuantity - $validate['quantity'];
            if ($validate['quantity'] <= $availableQuantity) {
                DB::select("update orders set quantity = :quantity where order_id = :id",['quantity' => $validate['quantity'] , 'id' => $validate['order_id']]);
                DB::select("update products set quantity = :minus where product_id = :product_id", ['product_id' => $validate['product_id'], 'minus' => $minus]);
                
                return response()->json(['status' => true , 'message' => 'Quantity updated successfully']);
            } else {
                return response()->json(['status' => false, 'message' => 'Quantity is greater than available quantity']);
            }

           
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }







}





