<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Product;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data = DB::select('SELECT p.* , u.fname AS ufname , u.lname AS ulname FROM products p LEFT JOIN users AS u ON u.id = p.created_by  WHERE p.quantity != 0');
       
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view('product.product-list');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = ["button" => $this->buttonPrivate("products",0,'id')];
        return view('product.product-details',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        
        $data = $request->all();
   
        $validator = Validator::make($data, [
            'product_name' => 'required|string',
            'supplier_name' => 'required|string',
            'expiration_date' => 'required|date',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'status' => 'required|string|max:50',
            'brand_name' => 'required|string',
            'quantity' => 'required|numeric',
            'originalquan' => 'required|numeric',
            'mg' => 'required|integer',
            // 'created_by' => 'required|integer', //comment if they have Auth
        ]);
         if ($validator->fails()) {
             return response()->json(['success' => false , 'response' => $validator->errors()],200);
         }


         try {

            $prod = new Product($validator->validated());

                // uncomment if they have already Auth
            $prod->created_by = Auth::user()->id;
            $prod->save();

            return response()->json(['success' => true, 'message' => 'Product created successfully'],200);
        } catch (\Exception $e) {

            return response()->json(['success' => false, 'message' => 'Failed to create product', 'error' => $e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , string $id)
    {
        //
        try {
            // Find the Product by $id
            // $datas = Product::findOrFail($id);
            $datas = DB::select('SELECT * FROM products WHERE id = ? AND quantity !=0',[$id]);

          
            

            $data = [
                "data" => $datas,
                "button" => $this->buttonPrivate("products",$id,'id')
            ] ;

            // dd($data['data']);
            if($request->ajax()){
                return response()->json(['success' => true, 'response' => $data]);
            }
       
            if(empty($data['data'])){  
                return view('page-error-404');
            }else{
                   return view('product.product-details',compact('data'));
     
            }

        } catch (\Exception $e) {
            // Return error response if Product not found or other exception occurs
            return response()->json(['success' => false, 'message' => 'Product not found', 'error' => $e->getMessage()],500);
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
         $auth = $this->Authentication("products",'id',$id);
            $data = $request->all();
            // Validate the incoming request data
            $validator = Validator::make($data, [
                'product_name' => 'required|string',
                'supplier_name' => 'required|string',
                'expiration_date' => 'nullable|date',
                'original_price' => 'required|numeric',
                'selling_price' => 'required|numeric',
                'status' => 'required|string|max:50',
                'brand_name' => 'required|string',
                'quantity' => 'required|numeric',
                'originalquan' => 'required|numeric',
                'mg' => 'required|integer',
                // 'created_by' => 'required|integer', //comment if they have Auth
            ]);

                // Check if validation fails
                if ($validator->fails()) {
                    return response()->json(['success' => false, 'response' => $validator->errors()], 200);
                }

                if($auth === 1){
                    try {
            
                        // Find the product by ID
                        $product = Product::findOrFail($id);
    
                        // Update the product with validated data
                        $product->fill($validator->validated());
    
                        // Uncomment if you want to update 'created_by' based on authenticated user
                        $product->updated_by = Auth::user()->fname.' '.Auth::user()->lname ;
                        $product->save();
    
                        return response()->json(['success' => true, 'message' => 'Product updated successfully'], 200);
                    } catch (\Exception $e) {
                        return response()->json(['success' => false, 'message' => 'Failed to update product', 'error' => $e->getMessage()], 500);
                    }
                }else{
                    return response()->json(['success' => false, 'message' => 'You have no right to update this product.'], 200);
                }

               
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $auth = $this->Authentication("products",'id',$id);
        if($auth === 1){
            try {
                // $prod = Product::findOrFail($id);
                $prod = Product::findOrFail($id);
                $orders = DB::select('SELECT * FROM orders WHERE product_id = ?', [$prod->id]);
                
                // Check if there are any orders for this product
                $checkorder = count($orders) > 0;
                if ($prod->status == 'Available' || $checkorder) {
                    // Return a response indicating that deletion is not allowed
                    return response()->json([
                        'success' => false,
                        'message' => 'Cannot delete if status is Available or if there are associated orders.'
                    ]);
                }
                // Perform the deletion if the conditions are met
                $prod->delete();
                // Return a success response
                return response()->json(['success' => true, 'message' => 'Product is deleted.']);
               
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Failed to delete supplier', 'error' => $e->getMessage()], 500);
            }
        }else{
            return response()->json(['success' => false, 'message' => 'You have no rights to delete this product.']);
        }
        
    }

    public function producthistory(Request $request){
        $data = DB::select('SELECT p.* , u.fname AS ufname , u.lname AS ulname FROM products p INNER JOIN users AS u ON u.id = p.created_by  WHERE p.quantity = 0');    
        // return $data;   
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view('product.product-history',compact('data'));
    }
}
