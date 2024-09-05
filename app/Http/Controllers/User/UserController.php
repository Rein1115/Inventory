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
        $data = DB::select('SELECT * FROM users  ');
        // dd($data);
        if($request->ajax()){
            return response()->json($data);
        }
        return view('user.user-list');
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


    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , string $id)
    {
        //
        
        $data = DB::select('SELECT * FROM users WHERE id=?',[$id]);
        return response()->json($data[0]);
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
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' =>['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
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
    }
}
