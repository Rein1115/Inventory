<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\Models\Expense;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);
        if($admin[0]->count > 0){
            // $data = DB::select("SELECT DATE_FORMAT(expenses_date, '%Y') AS `year`,MONTH(expenses_date) AS `month`, DATE_FORMAT(expenses_date, '%M') AS `monthname` FROM expenses    GROUP BY DATE_FORMAT(expenses_date, '%Y'), DATE_FORMAT(expenses_date, '%M'),MONTH(expenses_date) ORDER BY MONTH(expenses_date) , YEAR(expenses_date)");

            $data = DB::select("SELECT DATE_FORMAT(expenses_date, '%Y') AS `year`,MONTH(expenses_date) AS `month`, DATE_FORMAT(expenses_date, '%M') AS `monthname` FROM expenses  WHERE YEAR(expenses_date) = ?  GROUP BY DATE_FORMAT(expenses_date, '%Y'), DATE_FORMAT(expenses_date, '%M'),MONTH(expenses_date) ORDER BY MONTH(expenses_date) , YEAR(expenses_date)",[$request->year]);
            if ($request->ajax()) {
                return response()->json($data);
            }
            return view('expense.expenses-list');
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
        return response()->view('page-error-404', [], 404);
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

        $admin = DB::select('SELECT COUNT(*) AS count FROM users WHERE role = "Admin" AND id = ?' , [Auth::user()->id]);

        if($admin[0]->count > 0){
            $data['expenses'] = DB:: select('SELECT id, amount,  category,expenses_date,created_by ,DATE_FORMAT(expenses_date, "%M") AS monthname, YEAR(expenses_date) AS `year`  FROM expenses WHERE MONTH(expenses_date) =? ',[$id]);

            $result = [];
            for($i = 0; $i<count($data['expenses']); $i++){
    
                $result = [
                    "month" => $data['expenses'][$i]->monthname,
                    "year" => $data['expenses'][$i]->year,
                    "data"=> $data
                ];
            }
            return response()->json($result);
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        try{
            $data = $request->all();

            $validator = Validator::make($data, [
                'category' => 'required|string',
                'amount' => 'required|numeric',
                'expenses_date' => 'required|date' 
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422); 
            }

            if($id == 0){
 

                Expense::create([
                    'category' => $data['category'],
                    'amount' => $data['amount'],
                    'expenses_date' => $data['expenses_date'],
                    'created_by' => Auth::user()->fullname,
                    'created_id' => Auth::user()->id,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Expense saved successfully!',

                ], 200); 
                
            }else{

                $expense = Expense::find($id);

                    if (!$expense) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Expense not found.'
                        ], 404); 
                    }

                    $expense->update([
                        'category' => $data['category'],
                        'amount' => $data['amount'],
                        'expenses_date' => $data['expenses_date'],
                        'updated_by' => Auth::user()->fullname,
                        // 'created_id' => Auth::user()->id,s
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'Expense updated successfully!',
                        'data' => $expense
                    ], 200); 
            }

        }catch(Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()],422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  
        try{
            $data = DB::delete('DELETE FROM expenses WHERE id = ?', [$id]);

            if ($data) {
                return response()->json(['success' => true, 'message' => 'Expense deleted successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to delete this expense.'], 422);
            }
        }catch(Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()],422);
        }

    
    }


    public function getIndividualexpenses(string $id){
        $data = DB::select('SELECT * FROM expenses WHERE id = ? ',[$id]);
        return response()->json($data);
    }
}
