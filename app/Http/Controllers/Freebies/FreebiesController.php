<?php

namespace App\Http\Controllers\Freebies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Freebie;

class FreebiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $data = $request->all();

            $validator = Validator::make($data,[
                "trans_No" => 'required | numeric',
                "product_id" => 'required | numeric',
                "quantity" => 'required | numeric',
            ]);


            if($validator->fails()){
                return response()->json(['success' => false , 'message' => $validator->errors()]);
            }

            $exsist = DB::select('SELECT count(*) AS count FROM freebies WHERE trans_No = ?  AND product_id = ? ',[$data['trans_No'],$data['product_id']]);


            if($exsist[0]->count > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product freebies already exists. Please review the freebies.'
                ]);
            }


    
            $productquantity = DB::select('SELECT id,quantity FROM products WHERE id = ? ' , [$data['product_id']]);


            // return $productquantity[0]->id;


            // Check if product exists
            if (empty($productquantity[0]->id)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found.'
                ]);
            }
    
            if ($data['quantity'] > $productquantity[0]->quantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Requested quantity exceeds available stock. Available quantity: ' . $productquantity[0]->quantity
                ]);
            }
            Freebie::create([
                'trans_No' => $data['trans_No'],
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
                // 'created_by' => Auth::user()->fullname,
                // 'created_id' => Auth::user()->id
                'created_by' => Auth::user()->fullname,
                'created_id' => Auth::user()->id
            ]);

             // Decrement the product quantity in the database
            DB::update('UPDATE products SET quantity = quantity - ? WHERE id = ?', [$data['quantity'], $data['product_id']]);

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Freebie record created successfully and stock updated.'
            ]);
        }catch (\Exception $e) {
            return response()->json(['status' => false,'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = DB::select('SELECT f.created_by,p.id AS product_id ,p.product_name,p.mg,p.brand_name,f.quantity,f.id FROM products AS p INNER JOIN freebies AS f ON f.product_id = p.id WHERE f.trans_No = ? ',[$id]);


        return response()->json($data);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
        //

        $auth = $this->Authentication("freebies",'id',$id);

        if($auth > 0) {


            try{
                $validator = Validator::make($request->all(), [
                    'quantity' => 'required|numeric'
                ]);
            
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'message' => $validator->errors()
                    ]);
                }
            
                // Find and delete the Freebie record
                $freebie = Freebie::find($id);
            
                if (!$freebie) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Freebie record not found.'
                    ]);
                }
            
                // Get the product ID from the freebie
                $productId = $freebie->product_id;
            
                // Delete the Freebie record
                $freebie->delete();
            
                // Update product quantity
                DB::update('UPDATE products SET quantity = quantity + ? WHERE id = ?', [$request->quantity, $productId]);
            
                // Return success response
                return response()->json([
                    'success' => true,
                    'message' => 'Freebie record deleted successfully and stock updated.'
                ]);

            }catch (\Exception $e) {
                return response()->json(['success' => false,'message' => 'An error occurred: ' . $e->getMessage()
                ]);
            }
           
        }else{
            return response()->json(['success' => false, 'message' => ' You dont have rights to delete this freebies.'],200);
        }
    }
}
