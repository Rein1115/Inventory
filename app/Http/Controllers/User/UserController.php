<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Product;
use Auth;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
            $data = DB::select('SELECT * FROM users  WHERE  `role` != "Admin" ');
            // dd($data);
            if($request->ajax()){
                return response()->json($data);
            }
            return view('user.user-list');
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        return response()->view('page-error-404', [], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , string $id)
    {
        //
        
        return response()->view('page-error-404', [], 404);
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

        $data = $request->all();
        $validator = Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' =>['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'response' => $validator->errors()], 200);
        }

        if ($id == 0) {
            // Create a new user
            User::create([
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'gender' => $data['gender'],
                'code' => 904385,
                'role' => $data['role'],
                'status' => $data['status'],
                'fullname' => strtoupper($data['fname'].' '.$data['lname']),
                'created_by' => Auth::user()->fullname,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        } else {
            // Update the existing user
            $user = User::findOrFail($id);
            $user->update([
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'gender' => $data['gender'],
                'role' => $data['role'],
                'status' => $data['status'],
                'fullname' => strtoupper($data['fname'].' '.$data['lname']),
                'email' => $data['email'],
                'password' =>  Hash::make($data['password'])
            ]);
        }

        return response()->json(['success' => true, 'response' => $id == 0 ? 'User registered successfully.' : 'User updated successfully.'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            
            $rowsAffected = DB::delete(
                'DELETE FROM users WHERE id = ? AND (`status` = "Inactive" AND `role` != "Admin")',
                [$id]
            );
        
  
            if ($rowsAffected > 0) {
                return response()->json(['success' => true, 'response' => 'Inactive user deleted successfully']);
            } else {
                return response()->json(['success' => false, 'response' => 'You can\'t delete an active user or a user with Admin role.']);
            }
        } catch (Exception $e) {
  
            return response()->json(['success' => false, 'response' => $e->getMessage()]);
        }
        

        

    }
}
