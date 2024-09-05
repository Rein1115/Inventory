<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Clinic;
use Auth;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

            if($request->ajax()){
                $data = DB::select('SELECT c.id,c.fname AS clientfname,c.created_at AS clientcreatedat, c. lname AS clientlname,c.contact_no AS clientcontact, c.clinic_name AS clientclinic, c.address AS clientaddress,c.zipcode AS clientzip, u.fname, u.lname FROM clinics AS c INNER JOIN users AS u ON u.id = c.created_by');
    
                return response()->json($data);
            }
            return view('clinic.clinic-list');

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
        //
        try {
            $data = Clinic::find($id);
            return response()->json(['success' => true ,'response' => $data]);
        }catch(Exception $e){
            return response()->json(['success' => false, 'error' => $e->getMessage()],500);
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
            'fname' => 'required|string|max:500',
            'lname' => 'required|string|max:500',
            'contact_no' => 'required|numeric',
            'clinic_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'zipcode' => 'required|string|max:50',
        ]);
 

         if ($validator->fails()) {
             return response()->json(['success' => false , 'response' => $validator->errors()],200);
         }


         try {

            if ($id === '0') {
                $clinic = new Clinic($validator->validated());
                $clinic->created_by = Auth::user()->id;
                $clinic->save();
                return response()->json(['success' => true, 'message' => 'Clinic created successfully'], 200);
            } else {
                $clinic = Clinic::findOrFail($id);
                $clinic->fill($validator->validated());
                $clinic->created_by = Auth::user()->id; // Ensure this line is always set for created_by
        
                $clinic->save(); // Using save() instead of update() after fill()
                return response()->json(['success' => true, 'message' => 'Clinic updated successfully'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to create clinic', 'error' => $e->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
            $data = DB::select('DELETE FROM clinics WHERE id = ? ' , [$id]);
            return response()->json(['success' => true , 'response' => "Clinic successfully deleted."]);
        }catch(Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()],500);
        }

    }
}
