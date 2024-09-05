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

    public function supplier(){


            $data = DB::select('SELECT * FROM suppliers');
        return response()->json($data);
    }

    public function brand(){
        $data = DB::select('SELECT * FROM brands');
        return response()->json($data);
    }

}
