<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Order;
use Auth;
use App\Models\Product;
use App\Http\Controllers\Product\ProductController;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        //
            $data= DB::select('SELECT o.created_id,o.terms,o.trans_no, o.or, o.deliveredto,o.created_by,o.updated_by,o.address,o.created_at, u.fname , u.lname  FROM orders AS o LEFT JOIN users AS u ON u.id = o.created_by LEFT JOIN products AS p ON p.id = o.product_id GROUP BY trans_no, `or`, deliveredto,created_by,`address`,created_at,terms, u.fname , u.lname,o.updated_by,o.created_id');
            if($request->ajax()){
                return response()->json($data);
            }
   
            $datas = DB::select('SELECT * FROM orders');
            return view('order.order-list',compact('datas'));
  
            // return response()->json($data);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = DB::select('SELECT * FROM products');
        $data = ["button" => $this->buttonPrivate("orders",0,'trans_no'),"productlist" => []];
        return view('order.order-details',compact('data','products'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $validator = Validator::make($data,[
            "po_no" => 'string|required', //done
            "terms" => 'string|required',  //done
            "address" => 'string|required', //done
            "delivered_date" => 'string|required', //done
            "deliveredto" => 'string|required', //done
            "fullname" => 'string|required', //done
            "contact_num" => 'numeric|required', //done
            "deliveredby" => 'string|required',  //done
            "or" => 'string|required', //done
            "cr" => 'string|required', //done
            "email" =>'string|nullable',
            "collected_by" => 'string|required', //done
        ]);


        if($validator->fails()){
            return response()->json(['success' => false, 'Detect' => 'Header' , 'response' => $validator->errors()]);
        }

        $existsor = DB::select('SELECT count(*) AS count FROM orders WHERE `or` = ?',[$data['or']]);
        $existspo = DB::select('SELECT count(*) AS count FROM orders WHERE `po_no` = ?',[$data['po_no']]);
        $existscr = DB::select('SELECT count(*) AS count FROM orders WHERE `cr` = ?',[$data['cr']]);

        if($existsor[0]->count > 0){
            return response()->json(['success' => false, 'message'=> 'OR no. is already exists. Please check first.']) ;
           
        }
        else if($existspo[0]->count > 0 ) {
            return response()->json(['success' => false, 'message'=> 'PO no. is already exists. Please check first.']) ;
        }
        else if ($existscr[0]->count > 0 ){
            return response()->json(['success' => false, 'message'=> 'cr no. is already exists. Please check first.']) ;
        }

        $maxTransNo = DB::table('orders')->max('trans_no');
        $transNo = $maxTransNo ? $maxTransNo + 1 : 1;

        $lines = Validator::make($data['lines'],[
            "product_id" => 'integer|required',
            "quantity" => 'integer|required',
            "total_amount" => 'integer|required'
        ]);
        if($validator->fails()){
            return response()->json(['success' => false, 'Detect' => 'Lines' , 'message' => $validator->errors()]);
        }
      


        try {
            DB::beginTransaction(); // Start a transaction
        
            for ($i = 0; $i < count($data['lines']); $i++) {
                $line = $data['lines'][$i];
                
                $product = Product::find($line['product_id']);
                if ($product) {
                    if ($product->quantity < $line['quantity']) {
                        return response()->json([
                            'success' => false, 
                            'response' => "$product->product_name Not enough stock(s)."
                        ]);
                    }
                    $product->quantity -= $line['quantity'];
                    $product->save(); 
                } else {
                    return response()->json([
                        'success' => false, 
                        'message' => 'Product not found', 
                        'product_id' => $line['product_id']
                    ]);
                }
        
                

                Order::create([
                    'trans_no' => $transNo,
                    'product_id' => $line['product_id'],
                    'deliveredto' => $data['deliveredto'],
                    'address' => $data['address'],
                    'delivered_date' => $data['delivered_date'],
                    'quantity' => $line['quantity'],
                    'total_amount' => $line['total_amount'],
                    'po_no' => $data['po_no'],
                    'terms' => $data['terms'],
                    'deliveredby' => $data['deliveredby'],
                    'fullname' => $data['fullname'],
                    'contact_num' => $data['contact_num'],
                    'or' => $data['or'],
                    'cr' => $data['cr'],
                    'collected_by' => $data['collected_by'],
                    'payment_status' => 'Unpaid',
                    'created_by' => Auth::user()->fullname,
                    'created_id' => Auth::user()->id,
                    'email' => $data['email']

                ]);
            }
        
            DB::commit(); // Commit the transaction
        
            return response()->json(['success' => true, 'message' => 'Order(s) checkout successfully']);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of error
            return response()->json(['success' => false, 'message' => 'An error occurred during insertion', 'error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
   

     public function show(string $id)
     {
         $result = DB::select('SELECT * FROM orders WHERE trans_no = ? ',[$id]);
         if (empty($result)) {
             return response()->view('page-error-404', [], 404);
         }
         $productlist = DB::select('SELECT p.product_name,o.quantity,o.total_amount,p.selling_price,p.brand_name,p.unit FROM orders AS o LEFT JOIN products AS p ON p.id = o.product_id WHERE o.trans_no = ?' ,[$id]);
         $datas = [] ; 


         $orders =  db::select('SELECT p.product_name, o.trans_no,o.product_id, o.quantity, o.total_amount,p.unit,p.brand_name FROM orders AS o INNER JOIN products AS p ON o.product_id = p.id  WHERE o.trans_no = ? ', [$id]);


         $overalltotal = 0;
         foreach($orders AS $totalamount){
            $overalltotal += $totalamount->total_amount;
         }




         for($i = 0; $i<count($result); $i++){
 
 
             $data = [
                 "transNo" => $result[$i]->trans_no,
                 "po_no" => $result[$i]->po_no,
                 "address" => $result[$i]->address, 
                 "delivered_date" => $result[$i]->delivered_date,
                 "deliveredto" => $result[$i]->deliveredto,
                 "fullname" => $result[$i]->fullname,
                 "contact_num" => $result[$i]->contact_num,
                 "deliveredby"  => $result[$i]->deliveredby,
                 "or" => $result[$i]->or,
                 "cr" => $result[$i]->cr, 
                 "terms" =>   $result[$i]->terms,
                 "payment_status" => $result[$i]->payment_status,              
                 "collected_by" =>$result[$i]->collected_by ,
                 "email" => $result[$i]->email,
                 "readonly" => $result[$i]->created_id == Auth::user()->id || Auth::user()->role === "Admin"  ? " " : 
                 "readonly",
                 "lines" =>$orders,
                 "productlist" => $productlist,
                 "freebieslist" => DB::select('SELECT p.product_name,f.quantity,p.selling_price,p.brand_name,p.unit FROM freebies AS f INNER JOIN products AS p ON p.id = f.product_id WHERE f.trans_No =? ',[$id]),
                 "totalall" => $overalltotal,
                 "button" => $this->buttonPrivate("orders",$id,'trans_no')
             ];
         }
 
             $products = DB::select('SELECT * FROM products');
 
         return view('order.order-details',compact('data','products'));
         // return $result;
 
 
     }

    // public function show(string $id)
    // {
    //     $result = DB::select('SELECT * FROM orders WHERE trans_no = ? ',[$id]);
    //     if (empty($result)) {
    //         return response()->view('page-error-404', [], 404);
    //     }
    //     $productlist = DB::select('SELECT p.product_name,o.quantity,o.total_amount,p.selling_price,p.brand_name,p.unit FROM orders AS o LEFT JOIN products AS p ON p.id = o.product_id WHERE o.trans_no = ?' ,[$id]);
    //     $datas = [] ; 


    //     $orders =  db::select('SELECT p.selling_price,p.product_name, o.trans_no,o.product_id, o.quantity, o.total_amount,p.unit,p.brand_name FROM orders AS o INNER JOIN products AS p ON o.product_id = p.id  WHERE o.trans_no = ? ', [$id]);


    //     $overalltotal = 0;
    //     foreach($orders AS $totalamount){
    //        $overalltotal += $totalamount->total_amount;
    //     }

    //     $brandprod = (new ProductController)->productList();
    //     $datas = $brandprod->getData(); 
    //     $brand = $datas->brand;
    //     $prodlist  = $datas->products;
    //     $products = DB::select('SELECT * FROM products where status= "Available"');


    //     for($i = 0; $i<count($result); $i++){


    //         $data = [
    //             "transNo" => $result[$i]->trans_no,
    //             "po_no" => $result[$i]->po_no,
    //             "address" => $result[$i]->address, 
    //             "delivered_date" => $result[$i]->delivered_date,
    //             "deliveredto" => $result[$i]->deliveredto,
    //             "fullname" => $result[$i]->fullname,
    //             "contact_num" => $result[$i]->contact_num,
    //             "deliveredby"  => $result[$i]->deliveredby,
    //             "or" => $result[$i]->or,
    //             "cr" => $result[$i]->cr, 
    //             "terms" =>   $result[$i]->terms,
    //             "payment_status" => $result[$i]->payment_status,              
    //             "collected_by" =>$result[$i]->collected_by ,
    //             "email" => $result[$i]->email,
    //             "readonly" => $result[$i]->created_id == Auth::user()->id || Auth::user()->role === "Admin"  ? " " : 
    //             "readonly",
    //             "lines" =>$orders,
    //             "productlist" => $productlist,
    //             "freebieslist" => DB::select('SELECT p.id,p.product_name,f.quantity,p.selling_price,p.brand_name,p.unit FROM freebies AS f INNER JOIN products AS p ON p.id = f.product_id WHERE f.trans_No =? ',[$id]),
    //             "totalall" => $overalltotal,
    //             "prodlist" =>$prodlist,
    //             "brand" => $brand,
    //             "button" => $this->buttonPrivate("orders",$id,'trans_no')
    //         ];
    //     }

    //     $products = DB::select('SELECT * FROM products');

    //     //  add for test
    //     $brandprod = (new ProductController)->productList();
    //     $brandprod = (new ProductController)->productList();
    //     $datas = $brandprod->getData(); 
    //     $brand = $datas->brand;
    //     $prodlist  = $datas->products;

    //     // dd($data);
    //     return view('order.order-pos-details',compact('data'));
 

    // }



    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        //
        return response()->view('page-error-404', [], 404);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id){


        $data = $request->all();

        $validator = Validator::make($data,[
            "po_no" => 'string|required', //done
            "terms" => 'string|required',  //done
            "address" => 'string|required', //done
            "delivered_date" => 'string|required', //done
            "deliveredto" => 'string|required', //done
            "fullname" => 'string|required', //done
            "contact_num" => 'numeric|required', //done
            "deliveredby" => 'string|required',  //done
            "or" => 'string|required', //done
            "cr" => 'string|required', //done
            "email" =>'string|nullable',
            "collected_by" => 'string|required', //done
        ]);


        if($validator->fails()){
            return response()->json(['success' => false, 'Detect' => 'Header' , 'response' => $validator->errors()]);
        }

        $existsor = DB::select('SELECT COUNT(*) AS count FROM orders WHERE `or` = ? AND trans_no != ?', [$data['or'], $id]);
        $existspo = DB::select('SELECT count(*) AS count FROM orders WHERE `po_no` = ? AND trans_no !=?',[$data['po_no'] , $id]);
        $existscr = DB::select('SELECT count(*) AS count FROM orders WHERE `cr` = ? AND trans_no!= ? ',[$data['cr'],$id]);

        if($existsor[0]->count > 0){
            return response()->json(['success' => false, 'message'=> 'OR no. is already exists. Please check first.']) ;
           
        }
        else if($existspo[0]->count > 0 ) {
            return response()->json(['success' => false, 'message'=> 'PO no. is already exists. Please check first.']) ;
        }
        else if ($existscr[0]->count > 0 ){
            return response()->json(['success' => false, 'message'=> 'cr no. is already exists. Please check first.']) ;
        }
        
        try {
            DB::beginTransaction();
                $update = DB::update('UPDATE orders SET deliveredto = ?, `address` = ? , delivered_date =?, po_no = ? , terms = ?,  deliveredby = ? , fullname =? , contact_num = ?, `or` =? , cr =? , collected_by = ?,updated_by = ?,email =? WHERE trans_no = ?  ', [
                    $data['deliveredto'],$data['address'],$data['delivered_date'],$data['po_no'],$data['terms'],$data['deliveredby'],$data['fullname'],$data['contact_num'],$data['or'],$data['cr'],$data['collected_by'],Auth::user()->fullname,$data['email'],$id]
                );
                if ($update) {
                    // Commit transaction
                    DB::commit();
                    return response()->json(['success' => true, 'message' => 'Order information updated successfully.']);
                } else {
                    // Rollback if no rows were affected
                    DB::rollBack();
                    return response()->json(['success' => false, 'message' => 'No updates made.'], 400);
                }


                // return response()->json(['success' => true, 'message' => 'Order information updated successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update information order.', 'error' => $e->getMessage()]);
        }
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,string $id)
    {       

        $auth = $this->Authentication("orders",'trans_no',$id);
        // return response()->json(['success' => true, 'message' => $auth],200);
        if($auth === 1){
            try{ 

                $data = $request->all();


                $existsfreebies = DB::select('SELECT COUNT(*) AS count FROM freebies WHERE trans_No =? ',[$id]);

                if($existsfreebies[0]->count > 0){
                    return response()->json([
                        'success' => false,
                        'message' => 'You cannot delete this order because it has associated freebies. Please delete the associated freebies before attempting to delete this order.'
                    ], 200);
                }
        
                $validator = Validator::make($data['order'], [
                   'quantity' => 'required|integer',
                    'product_id' => 'required|integer'
                ]);
                $totalQuantity= [];
                $updated = []; 
                $prod_id = [];
                $count = 0 ;

                $selectpay = DB::select('SELECT count(*)AS count FROM orders AS o INNER JOIN payments AS p ON p.order_transno = o.trans_no WHERE p.order_transno = ? ',[$id]);

                // return $selectpay[0]->count;

                if($selectpay[0]->count > 0) {
                    return response()->json(['success' => false, 'message' => 'You cant delete this order cause they have already payment.'],200);
                }
                else{
                    for ($i = 0; $i < count($data['order']); $i++) {
                        $var = $data['order'][$i];
            
            
                        $prod_id[$i] =  $var['product_id'];
                        $quer = DB::select('SELECT quantity FROM products WHERE id = ?', [$prod_id[$i]]);
            
               
                        $totalQuantity[$i] = $var['quantity'];
                        foreach ($quer as $row) {
                            $totalQuantity[$i] += $row->quantity;
                        }
                        $updated[$i] = DB::update('UPDATE products SET quantity = ? WHERE id = ? ', [$totalQuantity[$i],$prod_id[$i]]);
                        $count++;
                    }
            
                    if(count($prod_id) > 0 ){
                        DB::select('DELETE FROM orders WHERE trans_no = ? ', [$id]);
                    }
                    return response()->json(['success' => true, 'message' => 'Transaction deleted Successfully.'],200);
                }

               }catch(Exception $e){
                    return response()->json(['success' => false, 'message' => 'An error occurred during deletion', 'error' => $e->getMessage()]);
               }
        }
        else{
            return response()->json(['success' => false, 'message' => ' You dont have rights to delete this transaction.'],200);
        }

    }

    public function ordercreate(){
        $brandprod = (new ProductController)->productList();
        $datas = $brandprod->getData(); 
        $brand = $datas->brand;
        $prodlist  = $datas->products;
        $data = [
            "prodlist" =>$prodlist,
            "brand" => $brand,
            "button" => $this->buttonPrivate("orders",0,'trans_no')
        ];   
        // dd($data);
        return view('order.order-pos-details',compact('data'));
    }

    





}
