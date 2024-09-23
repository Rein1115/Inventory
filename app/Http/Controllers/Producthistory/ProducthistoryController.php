<?php

namespace App\Http\Controllers\Producthistory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Order;
use Auth;
use App\Models\Product;

class ProducthistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
           
            $data = DB::table('products as p')
            ->leftJoin(DB::raw('(SELECT product_id, SUM(quantity) AS total_orders_quantity FROM orders GROUP BY product_id) AS order_totals'), 'p.id', '=', 'order_totals.product_id')
            ->leftJoin(DB::raw('(SELECT product_id, SUM(quantity) AS total_freebies_quantity FROM freebies GROUP BY product_id) AS freebie_totals'), 'p.id', '=', 'freebie_totals.product_id')
            ->select(
                'p.id as product_id',
                'p.product_name',
                'p.brand_name',
                'p.mg',
                'p.selling_price',
                'p.original_price',
                'p.created_by',
                DB::raw("'OUT OF STOCK(S)' as stock_status"),
                DB::raw('COALESCE(order_totals.total_orders_quantity, 0) as total_orders_quantity'),
                DB::raw('COALESCE(freebie_totals.total_freebies_quantity, 0) as total_freebies_quantity'),
                DB::raw('COALESCE(p.quantity, 0) as product_quantity'),
                DB::raw('(COALESCE(p.quantity, 0) + COALESCE(order_totals.total_orders_quantity, 0) + COALESCE(freebie_totals.total_freebies_quantity, 0)) as total_quantity')
            )
            ->groupBy('p.id', 'p.product_name', 'p.brand_name', 'p.mg', 'p.quantity', 'order_totals.total_orders_quantity', 'freebie_totals.total_freebies_quantity', 'p.selling_price',
            'p.original_price','p.created_by')
            ->having('product_quantity', '=', 0)
            ->get();
      
            if ($request->ajax()) {
                return response()->json($data);
            }
            return view('product.product-history',compact('data'));
            if($request->ajax()){
                return response()->json($data);
            }
            return view('brand.brand-list');
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
        return response()->view('page-error-404', [], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response()->view('page-error-404', [], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
           

      
            
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

        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){


            try{
                $data = DB::update('UPDATE products SET quantity = ? ,updated_by = ?
                 WHERE id = ?',[$request->quantity,Auth::user()->fullname,$id]);
            if($data){
                return response()->json(['success' =>true, 'message' => 'Quantity added successfully.'],200);
            }else{
                return response()->json(['success' =>false, 'message' => 'You can`t update the quantity!'],200);
            }


            }catch(Exception $e){
                return response()->json(['success' => false , 'message'=>$e->getmessage()]);
            }

  

      
            
        }
        else{
            return response()->view('page-error-404', [], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
