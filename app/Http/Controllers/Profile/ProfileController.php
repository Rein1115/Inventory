<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator; 
use App\Models\Order;
use Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try{    
            $data = DB::select('SELECT * FROM users WHERE id = ?' ,[Auth::user()->id]);
            // dd($data[0]->password);

            return view('profile.profile-details',compact('data'));
        }catch(Exception $e){   
            return response()->json(['success' => false, 'response' => $e]);
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
        try {
            // Validate request
            $validated = $request->validate([
                'email' => 'required|email',
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'password' => 'nullable|string|min:6|confirmed', // Password confirmation
                'current_password' => 'required|string', // Current password
            ]);
    
            // Verify current password
            if (!Hash::check($request->current_password, Auth::user()->password)) {
                return response()->json(['success' => false, 'response' => 'Current password is incorrect.']);
            }
    
            // Check if the email already exists
            $emailExists = DB::table('users')
            ->where('email', $request->email)
            ->where('id', '!=', Auth::user()->id)
            ->exists();

            if ($emailExists) {
                return response()->json(['success' => false, 'response' => 'Email already exists.']);
            }

            // Update user details
            $update = DB::update('UPDATE users SET email = ?, fname = ?, lname = ?, password = ? WHERE id = ?', [
                $request->email,
                $request->fname,
                $request->lname,
                !empty($request->password) ? Hash::make($request->password) : Auth::user()->password, // Hash password if provided, else keep current
                Auth::user()->id
            ]);
    
            return response()->json(['success' => true, 'response' => 'User updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'response' => 'An error occurred: ' . $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
