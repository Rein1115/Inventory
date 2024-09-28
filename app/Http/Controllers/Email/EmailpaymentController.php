<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentEmail;
use DB;
class EmailpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        try{
            $orders = DB::select('SELECT total_amount,email,fullname,`or`,po_no,deliveredto,terms,payment_status,`address`,delivered_date FROM orders WHERE trans_no = ?',[$id]);

            $exactamount = 0;
            foreach($orders AS $item){
                $exactamount += $item->total_amount;
            }

            $payments = DB::select('SELECT * FROM payments WHERE order_transno = ? ',[$id]);

            $balanceamount = 0;
            foreach($payments AS $pay){
                $balanceamount += $pay->payment;
            }


            $overallbalance = $exactamount-$balanceamount;
            $result = [];
            for($i = 0; $i < count($orders); $i++){
                $freebies = DB::select('SELECT p.product_name,f.quantity,p.unit,p.brand_name,p.selling_price, CONCAT("FREE") AS totalamount FROM freebies AS f INNER JOIN products AS p ON p.id = f.product_id WHERE f.trans_no =? ', [$id]);
                $result = [
                    "OR" => $orders[$i]->or,
                    "email" =>$orders[$i]->email,
                    "PO" => $orders[$i]->po_no,
                    "fullname" => $orders[$i]->fullname,
                    "Terms" => $orders[$i]->terms,
                    "Deliveredto" => $orders[$i]->deliveredto,
                    "Address" => $orders[$i]->address,
                    "Date_delivered"=>$orders[$i]->delivered_date,
                    "Payment_status" => $orders[$i]->payment_status,
                    "orders" => db::select('SELECT p.product_name,p.unit,p.brand_name,p.selling_price,o.quantity,o.total_amount FROM orders AS o INNER JOIN products AS p ON o.product_id = p.id WHERE o.trans_no = ? ', [$id]),
                    "freebies" => $freebies,
                    "payments" => $payments,
                    "exactAmount" => number_format($exactamount,2),
                    "balanceamount" =>number_format($overallbalance,2),
                    "totalallpayment" => number_format($balanceamount,2)
                ];
            } 
            // return response()->json($result);
            Mail::to($result['email'])->send(new PaymentEmail($result));
            return response()->json(['success' => true, 'message' => 'Invoice mail sent successfully.']);
        }catch(Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()],422);
        }
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
    public function destroy(string $id)
    {
        //
    }
}
