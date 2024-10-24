<?php

namespace App\Http\Controllers\Summary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AnualsalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DB::select('SELECT YEAR(created_at) AS year FROM payments GROUP BY YEAR(created_at)');
        return response()->json($data);

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

        $payment= DB::select('SELECT sum(payment) AS totalsales FROM payments WHERE YEAR(created_at) = ?' , [$id]);

        $result = [];
        for($p = 0; $p<count($payment); $p++){



            $result =[
                
                "totalsales" => $payment[$p]->totalsales
            ];
        }
        return response()->json($result);
        
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
    public function destroy(string $id)
    {
        //
    }
}
