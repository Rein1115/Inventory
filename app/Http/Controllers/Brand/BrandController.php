<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Brand;
use Auth;
use Illuminate\Support\Facades\Validator; 

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = DB::select('SELECT b.id , u.fname AS fname , b.created_at AS created_at , u.lname AS lname,  b.brand_name AS brand_name FROM brands AS b INNER JOIN users AS u ON u.id = b.created_by ');


        if($request->ajax()){
            return response()->json($data);
        }
        return view('brand.brand-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        // if($request->ajax()){
        //     $data = $this->buttonPublic('Save','0');
        //     return response()->json($data);
        // }
        return view('brand.brand-details');
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
        try {
            // Find the Brand by $id
            $data = Brand::findOrFail($id);
    
            // Return JSON response with the found Brand
            return response()->json(['success' => true, 'response' => $data],200);
        } catch (\Exception $e) {
            // Return error response if Brand not found or other exception occurs
            return response()->json(['success' => false, 'message' => 'Brand not found', 'error' => $e->getMessage()],500);
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
        $data = $request->all();
        $validator = Validator::make($data, [
            "brand_name" => 'required|string|max:200',
        ]);
    

        if ($validator->fails()) {
            return response()->json(['success' => false, 'response' => $validator->errors()]);
        }


        if($id==='0'){
            $exists = DB::table('brands')
                         ->where('brand_name', $data['brand_name'])
                         ->exists();
    
    
            try {
                if($exists) {
                    return response()->json(['success' => false, 'message' => 'Brand Name already registered'],200);
                }
        
                $brand = new Brand($validator->validated());
    
                    // uncomment if they have already Auth
                        $brand->created_by = Auth::user()->id ;
                  
                
                
    
                $brand->save();

                return response()->json(['success' => true, 'message' => 'Brand name created successfully'],200);
            } catch (\Exception $e) {

                return response()->json(['success' => false, 'message' => 'Failed to create brand', 'error' => $e->getMessage()],500);
            }
        }
        else{
            try {

                $brand = Brand::findOrFail($id);
        
          
                // Check if the updated fname, lname, and company already exist for another Brand
                $exists = Brand::where('brand_name', $request->input('brand_name'))
                        ->where('id', '!=', $id) // Exclude the current Brand being updated
                        ->exists();
                
                        if ($exists) {
                            return response()->json(['success' => false, 'message' => 'Brand Name already exists']);
                        }
                        $brand->updated_by = Auth::user()->fname.' '.Auth::user()->lname ;
                        $brand->update($validator->validated());
                       
                    
                        return response()->json(['success' => true, 'message' => 'Brand updated successfully']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Failed to update Brand', 'error' => $e->getMessage()],500);
            }
        }
    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
          
            $brand = Brand::findOrFail($id);
            $brand->delete();
            return response()->json(['success' => true, 'message' => 'Brand deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete brand', 'error' => $e->getMessage()], 500);
        }
    }
}
