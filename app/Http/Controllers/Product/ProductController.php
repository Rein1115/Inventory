<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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


        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
            $data = DB::select('SELECT p.* , u.fname AS ufname , u.lname AS ulname FROM products p LEFT JOIN users AS u ON u.id = p.created_by  WHERE p.quantity != 0');
            if ($request->ajax()) {
                return response()->json($data);
            }
            return view('product.product-list');
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
        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
        $data = ["button" => $this->buttonPrivate("products",0,'id')];
        return view('product.product-details',compact('data'));
        }
        else{

            return response()->view('page-error-404', [], 404);
        }


        
        // $data = ["button" => $this->buttonPrivate("products",0,'id')];
        // return view('product.product-details',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        
        $data = $request->all();

        // return $data;
   
        $validator = Validator::make($data, [
            'product_name' => 'required|string',
            'supplier_name' => 'required|string',
            'expiration_date' => 'required|date',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'status' => 'required|string|max:50',
            'brand_name' => 'required|string',
            'quantity' => 'required|numeric',
            'mg' => 'required|integer',
            // 'created_by' => 'required|integer', //comment if they have Auth
        ]);
         if ($validator->fails()) {
             return response()->json(['success' => false , 'response' => $validator->errors()],200);
         }


         try {

            $prod = new Product($validator->validated());

                // uncomment if they have already Auth
            $prod->created_by = Auth::user()->fullname;
            $prod->created_id = Auth::user()->id;
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
        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
            try {
                // Find the Product by $id
                // $datas = Product::findOrFail($id);
                $datas = DB::select('SELECT * FROM products WHERE id = ? AND quantity !=0',[$id]);
    
                // Check if the product is associated with any orders
                $hasOrder = DB::select('SELECT COUNT(*) AS count FROM orders WHERE product_id = ?', [$id]);
                $hasFreebies = DB::select('SELECT COUNT(*) AS count FROM freebies WHERE product_id = ? ',[$id]);
    
                $data = [
                    "data" => $datas,
                    "button" => $this->buttonPrivate("products",$id,'id'),
                    "readonly" => $hasOrder[0]->count > 0 ||  $hasFreebies[0]->count > 0? 'readonly' : ''
                ] ;
    
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
        return response()->view('page-error-404', [], 404);
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
            
                        // Check if the product is associated with any orders
                        $hasOrder = DB::select('SELECT COUNT(*) AS count FROM orders WHERE product_id = ?', [$id]);
                        $hasFreebies = DB::select('SELECT COUNT(*) AS count FROM freebies WHERE product_id = ?',[$id]);
            
                        if ($hasOrder[0]->count > 0 || $hasFreebies[0]->count > 0) {
                            // If the product is associated with orders, allow only the quantity field to be updated
                            $updateData = Arr::only($validator->validated(), ['quantity','status']);
                        } else {
                            // If not associated with orders, update all fields
                            $updateData = $validator->validated();
                        }
            
                        // Update the product with the filtered data
                        $product->fill($updateData);
            
                        // Uncomment if you want to update 'created_by' based on authenticated user
                        $product->updated_by = Auth::user()->fullname;
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
                $freebies = DB::select('SELECT count(*) AS count FROM freebies WHERE product_id = ?', [$prod->id]);
                // Check if there are any orders for this product
                $checkorder = count($orders) > 0;
                if ($prod->status == 'Available' || $checkorder || $freebies[0]->count) {
                    // Return a response indicating that deletion is not allowed
                    return response()->json([
                        'success' => false,
                        'message' => 'Cannot delete if status is Available or if there are associated orders and freebies.'
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

}
