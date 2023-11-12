<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [];
        try{
          $response  =   Auth::check() ?  
            DB::SELECT('select  * from  products ') : [];
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }
        // dd($response);
        return view('products.productlist',compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $response = [];

            $validate = Auth::check() ?
            $request->validate([
                "productname" => "required",
                "quantity" => "required",
                "price" => "required",
                "expiration" => "required"
            ]) : [];

            
            DB::table('products')->insert([
                "product_name" => $validate['productname'],
                "quantity" => $validate['quantity'],
                "price" => number_format($validate['price'], 2, '.', ''),
                "expiration" => $validate['expiration'],
            ]);

            return response()->json(['status' => true , 'message' => 'Product Inserted Successfully']);

        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            try {
                $response = Auth::check()
                    ? (DB::table('products')->where('product_id', $id)->delete()
                        ? response()->json(['status' => true, 'message' => 'Product deleted successfully'])
                        : response()->json(['status' => false, 'message' => 'Product not found or not deleted'], 404))
                        : response()->json(['status' => false, 'message' => 'Unauthorized'], 401);
                return $response;
            } catch (\Exception $e) {
                return response()->json(['status' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
