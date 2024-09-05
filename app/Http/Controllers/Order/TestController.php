<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Order;
use Auth;
use App\Models\Product;


class TestController extends Controller
{
    public function test(Request $request , $id){


        return $request;
    }
}
