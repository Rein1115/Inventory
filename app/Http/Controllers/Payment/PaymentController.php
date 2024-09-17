<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Product;
use App\Models\Payment;
use Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data = DB::select('SELECT `address`,trans_no,po_no,`or`,payment_status,created_at,created_by FROM orders  GROUP BY trans_no,po_no,`or`,payment_status,created_at,created_by,address');

        if($request->ajax()){
            return response()->json($data);
        }

        return view('payment.payment-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('page-error-404', [], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try{
            $data = $request->all();

            $validator = Validator::make($data,[
                'order_transno' => 'required | integer' ,
                'payment' => 'required | numeric',
                'payment_mode' => 'required | string',
                'total_all' => 'required | numeric',
                'number'=> 'nullable| numeric',
                "pay_date" => 'string|required'
                // 'created_by' =>  'required | integer'
            ]);

            if($validator->fails()){
                return response()->json(['success' => false, 'response' => $validator->errors()]);
            }

            $overalltotal = DB::select('SELECT SUM(total_amount) AS total FROM orders WHERE trans_no = ? ', [$data['order_transno']]);

            $finaltotal;
            foreach($overalltotal AS $to){
                $finaltotal = $to->total;
            }
            if($data['total_all'] > $finaltotal){
                return response()->json(['success' => false, 'response' => 'Payment must be equal to or less than the balance amount.']);
            }
            DB::select('UPDATE orders SET payment_status = ? WHERE trans_no = ?',
                [$data['total_all'] == $finaltotal ? 'Paid' : 'Unpaid', $data['order_transno']]
            );

            $datas = Payment::create([
            'order_transno' => $data['order_transno'],
            'payment' => $data['payment'],
            'payment_mode' => $data['payment_mode'],
            'number' => $data['number'],
            'pay_date' => $data['pay_date'], 
            'created_by' => Auth::user()->id,
            'created_id' => Auth::user()->id,
        ]);

            return response()->json(['success' => true, 'message' => 'Payment inserted']);

        }catch(\Exception $e){
            return response()->json(['success' => false,  'message' => $e->getMessage()],500);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request ,string $id)
    {
        //
        // return $id;

        try {
            $orders = DB::select('SELECT * FROM orders WHERE trans_no = ?',[$id]);
            $totalamounts =0 ;
            foreach($orders as $totalamount){
                $totalamounts += $totalamount->total_amount;
            }
            $resultorders =[];
            for($i = 0 ; $i<count($orders); $i++){
                $resultorders = [
                    "trans_no" => $orders[$i]->trans_no, 
                    "or" => $orders[$i]->or,
                    "po_no" => $orders[$i]->po_no,
                    "deliveredto" => $orders[$i]->deliveredto,
                    "delivered_date" => $orders[$i]->delivered_date,
                    "address" => $orders[$i]->address,
                    "terms" => $orders[$i]->terms,
                    "deliveredby" => $orders[$i]->deliveredby,
                    "collected_by" => $orders[$i]->collected_by,
                    "status" => $orders[$i]->payment_status,
                    "total_amount" =>  $totalamounts,
                  
                ];
            }


            // dd($totalamounts);


        //  return $resultorders;
            $payments = DB::select('SELECT p.* ,u.id AS userid, u.fname ,u.lname FROM payments AS p INNER JOIN users AS u ON u.id = p.created_by WHERE p.order_transno = ? ', [$id]);


            $productlist = DB::select('SELECT p.product_name,o.quantity,o.total_amount,p.selling_price,p.brand_name,p.mg FROM orders AS o LEFT JOIN products AS p ON p.id = o.product_id WHERE o.trans_no = ?' ,[$id]);

            $data = [
                "orders" => $resultorders,
                "payments" => $payments,
                "productlist" => $productlist,
                "freebieslist" => DB::select('SELECT p.product_name,f.quantity,p.selling_price,p.brand_name,p.mg FROM freebies AS f INNER JOIN products AS p ON p.id = f.product_id WHERE f.trans_No =? ',[$id])
                // "button" => $this->buttonPrivate("orders",$id,'trans_no')
            ] ;

            // foreach($data['freebieslist'] AS $item){
            //     return $item->product_name;
            // }


            // dd($data['freebieslist']);


            if($request->ajax()){
                return response()->json(['success' => true, 'response' => $data]);
            }
       
            if(empty($data['orders'])){  
                return view('page-error-404');
            }else{
                   return view('payment.payment-details',compact('data'));
            }

        } catch (\Exception $e) {
            // Return error response if Product not found or other exception occurs
            return response()->json(['success' => false, 'message' => 'Product not found', 'error' => $e->getMessage()],500);
        }


        return view('payment.payment-details');
    }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
        //


        return $request->trans_No;

        // return response()->json($request->trans_No);
        try{
            $del = DB::delete('DELETE FROM payments WHERE id = ? AND (created_by = ? OR EXISTS (SELECT 1 FROM users WHERE id = ? AND role = "Admin"))', [$id, Auth::user()->id, Auth::user()->id]);

            if ($del > 0) {
                return response()->json(['success' => true, 'response' => 'Payment deleted']);
            } else {
                return response()->json(['success' => false, 'response' => 'You don\'t have rights to delete this payment or the payment does not exist.']);
            }


        }catch(Exception $e){
            return response()->json(['success' => false, 'response' => $e]);
        }
        
    }


    public function destroymodification(Request $request, string $id){
        // return $request->trans_No .$id;


        try{


            $selectorder = DB ::select('SELECT SUM(total_amount) AS total FROM orders WHERE trans_no = ? ',[$request->trans_No]);
            // return $selectorder[0]->total ;

            // if($selectorder[0]->total !== $request->total_amount){
            //     return "Unpaid";
            // }
            $del = DB::delete('DELETE FROM payments WHERE id = ? AND (created_by = ? OR EXISTS (SELECT 1 FROM users WHERE id = ? AND role = "Admin"))', [$id, Auth::user()->id, Auth::user()->id]);

       
            if($selectorder[0]->total !== $request->total_amount){
                $update = DB::update('UPDATE orders SET payment_status = "Unpaid" WHERE trans_no = ? ',[$request->trans_No]);

                if ($del > 0) {
                    return response()->json(['success' => true, 'response' => 'Payment deleted']);
                } else {
                    return response()->json(['success' => false, 'response' => 'You don\'t have rights to delete this payment or the payment does not exist.']);
                }

            }
    
        }catch(Exception $e){
            return response()->json(['success' => false, 'response' => $e]);
        }

    }
}
