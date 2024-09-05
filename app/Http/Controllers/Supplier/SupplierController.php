<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator; 
use Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = DB::select('SELECT s.* , u.fname AS ufname, u.lname AS ulname FROM suppliers AS s INNER JOIN users AS u ON u.id = s.created_by');
            return response()->json($data);
        }   
        return view('supplier.supplier-list');
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Find the supplier by $id
            $data = Supplier::findOrFail($id);
            // Return JSON response with the found supplier
            return response()->json(['success' => true, 'response' => $data],200);
        } catch (\Exception $e) {
            // Return error response if supplier not found or other exception occurs
            return response()->json(['success' => false, 'message' => 'Supplier not found', 'error' => $e->getMessage()],500);
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

        $data = $request->all();
        $validator = Validator::make($data, [
            "fname" => 'required|string|max:100',
            "lname" => 'required|string|max:100',
            "company" => 'required|string|max:100',
            "gender" => 'required|string|max:100',
            "contact_no" => 'required|digits_between:10,15',
            "address" => 'required|string|max:100',
        ]);
    

        if ($validator->fails()) {
            return response()->json(['success' => false, 'response' => $validator->errors()]);
        }
    
        try {

            if($id === '0'){
                     // Check if the supplier already exists
                    $exists = DB::table('suppliers')
                    ->where('fname', $data['fname'])
                    ->where('lname', $data['lname'])
                    ->where('company', $data['company'])
                    ->exists();
                if($exists) {
                    return response()->json(['success' => false, 'message' => 'Supplier already registered'],200);
                }
        
                $supplier = new Supplier($validator->validated());
    
                    // uncomment if they have already Auth
                $supplier->created_by = Auth::user()->id;
    
                $supplier->save();
    
            
                return response()->json(['success' => true, 'message' => 'Supplier created successfully'],200);
            }else{
                $supplier = Supplier::findOrFail($id);
    
      
                // Check if the updated fname, lname, and company already exist for another supplier
                $existingSupplier = Supplier::where('fname', $request->input('fname'))
                        ->where('lname', $request->input('lname'))
                        ->where('company', $request->input('company'))
                        ->where('id', '!=', $id) // Exclude the current supplier being updated
                        ->exists();
                
                        if ($existingSupplier) {
                            return response()->json(['success' => false, 'message' => 'Supplier already exists']);
                        }
                        $supplier->updated_by = Auth::user()->fname.' '.Auth::user()->lname;
                        $supplier->update($validator->validated());
                
                    
                        return response()->json(['success' => true, 'message' => 'Supplier updated successfully']);
            }

           
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update supplier', 'error' => $e->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();
            return response()->json(['success' => true, 'message' => 'Supplier deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete supplier', 'error' => $e->getMessage()], 500);
        }
    }
}
