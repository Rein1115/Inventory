<?php

namespace App\Http\Controllers\Summary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class AnualsalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
            $data = DB::select('SELECT YEAR(created_at) AS year FROM orders GROUP BY YEAR(created_at)');
            if ($request->ajax()) {
                return response()->json($data);
            }
            return view('summary.summary-list');
        }
        else{
            return response()->view('page-error-404', [], 404);
        }
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
        
        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
            // Fetch total sales for the specified year
            $data['payment'] = DB::select('SELECT SUM(payment) AS totalsales, YEAR(pay_date) AS year 
            FROM payments 
            WHERE YEAR(pay_date) = ? 
            GROUP BY YEAR(pay_date)', 
            [$id]
            );

            // Fetch total expenses for the specified year
            $data['expenses'] = DB::select('SELECT SUM(amount) AS total_expenses 
            FROM expenses 
            WHERE YEAR(expenses_date) = ?', 
            [$id]
            );

            // Fetch net profit for the specified year
            // ORIGINAL CODE
            // $data['netprofit'] = DB::select('SELECT SUM((p.selling_price - p.original_price) * o.quantity) AS net_profit
            // FROM orders AS o
            // LEFT JOIN products AS p ON p.id = o.product_id
            // WHERE o.payment_status = "Paid" AND YEAR(o.created_at) = ?', 
            // [$id]
            // );

            // REVISED CODE
            $data['cost'] = DB::select('SELECT o.trans_no, o.product_id,o.total_amount - SUM(p.original_price * (o.quantity + COALESCE(f.quantity, 0))) AS net_profit
            FROM orders AS o
            LEFT JOIN products AS p ON p.id = o.product_id
            LEFT JOIN freebies AS f ON p.id = f.product_id
            WHERE o.payment_status = "Paid" AND YEAR(o.created_at)
            GROUP BY o.trans_no, o.product_id, o.total_amount');
    
            $cost= 0;
            foreach($data['cost'] AS $net_profit){

                $cost +=  $net_profit->net_profit;
            }
            // Calculate final net profit
            $totalExpenses = $data['expenses'][0]->total_expenses ?? 0;
            $netProfit = $cost ?? 0;
            $data['finalnetprofit'] = ROUND($netProfit) - $totalExpenses;

            // Prepare the result
            $result = [
            "Year" => $data['payment'][0]->year ?? $id, // Default to $id if not found
            "totalsales" => $data['payment'][0]->totalsales ?? 0,
            "total_expenses" => $totalExpenses,
            "finalnetprofit" => $data['finalnetprofit']
            ];

            return response()->json($result);
        }
        else{
            return response()->view('page-error-404', [], 404);
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
