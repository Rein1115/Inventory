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

        // $data['totalcost'] = DB::select('SELECT sum(original_price * quantity) AS totalcost  FROM products');
        // $data['queryprod'] = DB::select('
        //     SELECT p.id AS product_id,
        //         (COALESCE(p.quantity, 0) + COALESCE(SUM(o.quantity), 0)) AS total_quantity,
        //         p.original_price
        //     FROM products AS p
        //     LEFT JOIN orders AS o ON o.product_id = p.id
        //     GROUP BY p.id, p.quantity, p.original_price
        // ');
        
        // $result = [];
        // foreach ($data['queryprod'] as $product) {
        //     // Calculate total cost for the product
        //     $totalCost = $product->total_quantity * $product->original_price;
            
        //     // Store the result for the current product
        //     $result[] = [
        //         'product_id' => $product->product_id,
        //         'total_quantity' => $product->total_quantity,
        //         'original_price' => $product->original_price,
        //         'total_cost' => $totalCost
        //     ];
        // }   


        $data['totalcost'] = db::select('SELECT SUM(total_cost) AS totalcost
        FROM (
            SELECT (COALESCE(p.quantity, 0) + COALESCE(SUM(o.quantity), 0)) * p.original_price AS total_cost
            FROM products AS p
            LEFT JOIN orders AS o ON o.product_id = p.id
            GROUP BY p.id, p.quantity, p.original_price
        ) AS product_totals;
        ');
        
        // return response()->json($data['totalcost']);


        return view('home',compact('data'));
    }


    public function dashboardgraph(){

        $date =  date("Y");
// return $date;
        $data = DB::select("SELECT 
        SUM(payment) AS total, 
        MONTHNAME(pay_date) AS formatted_date ,
        YEAR(pay_date) AS `year`
    FROM payments WHERE YEAR(pay_date) = ?
    
    GROUP BY YEAR(pay_date),MONTHNAME(pay_date)  ORDER BY MONTH(pay_date)",[$date]);
    

        return response()->json($data);
    }
    
    public function dashboardunot(){
      

        $data = DB::select('SELECT p.product_name, SUM(o.quantity) as total_quantity_sold ,p.brand_name AS brandname
        FROM products AS p
        LEFT JOIN orders AS o ON p.id = o.product_id WHERE o.product_id =p.id
        GROUP BY p.brand_name ,p.id, p.product_name
        ORDER BY total_quantity_sold DESC
        ');

    return response()->json($data);
    }
}
