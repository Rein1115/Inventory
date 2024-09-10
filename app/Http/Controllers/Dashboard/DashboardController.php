<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // 

    public function dashboardcard(){

        $date =  Carbon::now()->toDateString();

        $data['totalsales'] = DB::select('SELECT sum(payment) AS totalsales FROM payments');

        $data['incometoday'] = DB::select('SELECT SUM(payment) as total_payment FROM payments WHERE DATE(created_at) = ?', [$date]);

        $data['netprofit'] = DB::select(' SELECT SUM((p.selling_price - p.original_price) * o.quantity) AS net_profit
        FROM orders AS o
        LEFT JOIN products AS p ON p.id = o.product_id
        WHERE o.payment_status = "Paid"');

        $data['totalcost'] = DB::select('SELECT sum(original_price * quantity) AS totalcost  FROM products');
     
        return view('home',compact('data'));
    }


    public function dashboardgraph(){

        $date =  Carbon::now()->year();

        $data = DB::select("SELECT 
        SUM(payment) AS total, 
        MONTHNAME(pay_date) AS formatted_date 
    FROM payments
    GROUP BY MONTHNAME(pay_date)");
    

        return response()->json($data);
    }
    
    public function dashboardunot(){
      

        $data = DB::select('SELECT p.product_name, SUM(o.quantity) as total_quantity_sold
        FROM products AS p
        LEFT JOIN orders AS o ON p.id = o.product_id
        GROUP BY p.id, p.product_name
        ORDER BY total_quantity_sold ASC
        ');

    return response()->json($data);
    }
}
