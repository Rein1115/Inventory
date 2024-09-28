<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Product;
use App\Models\Payment;
use Auth;

class PaymenthistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
            $data = DB::select('SELECT 
                address, trans_no, po_no, `or`, payment_status, created_at, created_by 
            FROM 
                orders 
            WHERE 
                payment_status = "Paid"  
            GROUP BY 
                trans_no, po_no, `or`, payment_status, created_at, created_by, address
        ');

   

            if($request->ajax()){
                return response()->json($data);
            }
            return view('payment.payment-history-list');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request ,string $id)
    {
        //
        try {
            $orders = DB::select('SELECT * FROM orders WHERE payment_status = "Paid" AND trans_no = ?',[$id]);

            // return $orders;

            if(count($orders)>0){

                $totalamounts =0 ;
            foreach($orders as $totalamount){
                $totalamounts += $totalamount->total_amount;
            }
            $resultorders =[];
            for($i = 0 ; $i<count($orders); $i++){
                $resultorders = [
                    "trans_no" => $orders[$i]->trans_no, 
                    "or" => $orders[$i]->or,
                    "email"=>$orders[$i]->email,
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
            $payments = DB::select('SELECT
                CASE 
                    WHEN  ? = "Admin"
                    THEN CONCAT("<a class=\'btn btn-danger text-white del\' id=\'del\' data-id=\'", p.id, "\'><i class=\'icon-trash trash-icon\'></i></a>")
                    ELSE ""
                END AS btn,
                p.*, u.id AS userid, u.fname, u.lname 
            FROM 
                payments AS p 
            INNER JOIN 
                users AS u ON u.id = p.created_by 
            WHERE 
                p.order_transno = ?',[Auth::user()->role, $id]);
        
            $productlist = DB::select('SELECT p.product_name,o.quantity,o.total_amount,p.selling_price,p.brand_name,p.unit FROM orders AS o LEFT JOIN products AS p ON p.id = o.product_id WHERE o.trans_no = ?' ,[$id]);

            $data = [
                "orders" => $resultorders,
                "payments" => $payments,
                "productlist" => $productlist,
                "freebieslist" => DB::select('SELECT p.product_name,f.quantity,p.selling_price,p.brand_name,p.unit FROM freebies AS f INNER JOIN products AS p ON p.id = f.product_id WHERE f.trans_No =? ',[$id])
            ] ;


           
            if($request->ajax()){
                return response()->json(['success' => true, 'response' => $data]);
            }
            if(empty($data['orders'])){  
                return view('page-error-404');
            }else{
                   return view('payment.payment-history-details',compact('data'));
            }

            }
            return view('page-error-404');
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
    public function destroy(Request $request ,string $id)
    {
        //
  
    }
    public function modificationpaymenthistory(Request $request, string $id){
        try{


            // return $request->trans_No;

            $data = DB::delete('DELETE FROM payments WHERE id = ? AND ? = "Admin" ',[$id,Auth::user()->role]);

            if ($data) {
                DB::update('UPDATE orders SET payment_status = "Unpaid" WHERE trans_no = ? ',[$request->trans_No]);
                return response()->json(['success' => true, 'response' => 'Payment deleted successfully.']);
            } else {
                return response()->json(['success' => false, 'response' => 'You don\'t have rights to delete this payment.']);
            }            

        }catch(Exeption $e){
            return response()->json(['success' => true, 'response' => $e->getMessage()]);
        }

    }
}
