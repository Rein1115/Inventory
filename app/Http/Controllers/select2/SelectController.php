<?php

namespace App\Http\Controllers\select2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Product;

class SelectController extends Controller
{
    //

    public function supplier(Request $request){
        $data = DB::select('SELECT CONCAT(fname, " ", lname) AS id, CONCAT(fname, " ", lname) AS text
        FROM suppliers
        WHERE fname LIKE ? OR lname LIKE ?
    ', ['%' . $request->search . '%', '%' . $request->search . '%']);
        return response()->json($data);
    }

    public function brand(Request $request){
        $data = DB::select('SELECT brand_name AS id ,brand_name AS text FROM brands WHERE brand_name LIKE ?',['%'.$request->search.'%']);
        return response()->json($data);
    }

    public function Productslist(Request $request)
    {
        $sql = DB::select("SELECT selling_price, id AS id,CONCAT(product_name,' ','(',mg,'mg' ')',' ',(brand_name)) AS text, mg, brand_name, expiration_date, quantity FROM products WHERE (quantity != 0 AND status != 'Pending')
        AND product_name LIKE ?", ['%'.$request->search .'%']);
        return response()->json($sql);
    }

}
