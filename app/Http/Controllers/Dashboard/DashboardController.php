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

        $data['totalsales'] = DB::select('SELECT sum(payment) AS totalsales FROM payments WHERE ? = "Admin" OR created_id = ? ', [Auth::user()->role , Auth::user()->id]);

        $data['incometoday'] = DB::select('SELECT SUM(payment) as total_payment FROM payments WHERE DATE(created_at) = ? AND (? = "Admin" OR created_id = ? )', [$date,Auth::user()->role , Auth::user()->id]);


        $data['expenses'] = DB::select('SELECT SUM(amount) AS amount FROM expenses ');


        // ORIGINAL CODE
        // $data['netprofit'] = DB::select(' SELECT SUM((p.selling_price - p.original_price) * o.quantity) AS net_profit
        // FROM orders AS o
        // LEFT JOIN products AS p ON p.id = o.product_id
        // WHERE  o.payment_status = "Paid"');


        // revised code
        $data['cost'] = DB::select('SELECT 
            o.trans_no, 
            o.product_id,
            o.total_amount - SUM(p.original_price * (o.quantity + COALESCE(f.quantity, 0))) AS net_profit
        FROM orders AS o
        LEFT JOIN products AS p ON p.id = o.product_id
        LEFT JOIN freebies AS f ON p.id = f.product_id
        WHERE o.payment_status = "Paid"
        GROUP BY o.trans_no, o.product_id, o.total_amount');
    
        $result= 0;
        foreach($data['cost'] AS $net_profit){

            $result +=  $net_profit->net_profit;
        }

        $data['finalnetprofit'] =   $result- $data['expenses'][0]->amount;



        // ORIGINAL CODE
        $data['totalcost'] = db::select('SELECT 
                p.id AS product_id,
                p.product_name,
                COALESCE(p.quantity, 0) AS product_quantity,
                COALESCE(order_totals.orders_quantity, 0) AS orders_quantity,
                COALESCE(freebie_totals.freebies_quantity, 0) AS freebies_quantity,
                (COALESCE(p.quantity, 0) + COALESCE(order_totals.orders_quantity, 0) + COALESCE(freebie_totals.freebies_quantity, 0)) * p.original_price AS total_cost_per_product,
                SUM((COALESCE(p.quantity, 0) + COALESCE(order_totals.orders_quantity, 0) + COALESCE(freebie_totals.freebies_quantity, 0)) * p.original_price) OVER() AS total_cost
            FROM products AS p
            LEFT JOIN (
                SELECT product_id, SUM(quantity) AS orders_quantity
                FROM orders
                GROUP BY product_id
            ) AS order_totals ON p.id = order_totals.product_id
            LEFT JOIN (
                SELECT product_id, SUM(quantity) AS freebies_quantity
                FROM freebies
                GROUP BY product_id
            ) AS freebie_totals ON p.id = freebie_totals.product_id
            GROUP BY p.id, p.product_name, p.quantity, p.original_price, order_totals.orders_quantity, freebie_totals.freebies_quantity;
        ');

        // return response()->json($data['totalcost']);


        return view('home',compact('data'));
    }


    public function dashboardgraph(){

        $date =  date("Y");
        $data = DB::select("SELECT 
        SUM(payment) AS total, 
        MONTHNAME(pay_date) AS formatted_date ,
        YEAR(pay_date) AS `year`
        FROM payments WHERE YEAR(pay_date) = ? AND (? = 'Admin' OR created_id = ?)
        GROUP BY YEAR(pay_date),MONTHNAME(pay_date)  ORDER BY MONTH(pay_date)",[$date, Auth::user()->role,Auth::user()->id]);
    

        return response()->json($data);
    }
    
    public function dashboardunot(){
        $data = DB::select('SELECT p.unit AS unit , p.product_name, SUM(o.quantity) as total_quantity_sold ,p.brand_name AS brandname
        FROM products AS p
        LEFT JOIN orders AS o ON p.id = o.product_id WHERE o.product_id =p.id
        GROUP BY p.brand_name ,p.id, p.product_name ,p.unit 
        ORDER BY total_quantity_sold DESC
        ');
    return response()->json($data);
    }
}
