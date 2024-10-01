<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function buttonPrivate($innerparam ,$id,$tOid){
        $userCode = Auth::user()->id;
        $button = [];
        $isAdmin = Auth::user()->role === 'Admin';
        $createdByExists = DB::select("SELECT * FROM $innerparam WHERE created_id = ? AND $tOid = ?", [$userCode,$id]);
        // return $createdByExists;

            $button = [
                [
                    "class" => "btn btn-secondary text-white mr-2", 
                    "id" => "Btn-back",
                    "text" => "Back"
                ]
            ];
            
            if ($id === 0) {
                $button[] = [
                    "class" => "btn btn-primary mr-2", 
                    "id" => "Btn-save",
                    "text" => "Save"
                ];
            } elseif (!empty($createdByExists) || $isAdmin) {
                $button[] = [
                    "class" => "btn btn-success text-white mr-2", 
                    "id" => "Btn-update",
                    "text" => "Update"
                ];
                $button[] = [
                    "class" => "btn btn-danger text-white mr-2", 
                    "id" => "Btn-delete",
                    "text" => "Delete"
                ];
                $button[] = [
                    "class" => "btn btn-warning text-white mr-2", 
                    "id" => "invoice-print",
                    "text" => "Print"
                ];
            }
            return $button;
    }


    public function buttonPrivateList($innerparam ,$id){
        $userCode = Auth::user()->id;
        $button = [];
        $isAdmin = Auth::user()->role === 'Admin';
        $createdByExists = DB::select("SELECT * FROM $innerparam WHERE created_id = ? AND id = ?", [$userCode,$id]);

            $button = [
                [
                    "class" => "btn btn-secondary text-white view", 
                    "id" => "Btn-view",
                    "text" => "icon-eye eye-icon"
                ],
                  [
                    "class" => "btn btn-primary text-white edit", 
                    "id" => "Btn-edit",
                    "text" => "icon-pencil pencil-icon"
                  ]
            ];
            
            if (!empty($createdByExists) || $isAdmin) {
                $button[] = [
                    "class" => "btn btn-danger", 
                    "id" => "Btn-delete",
                    "text" => "Delete"
                ];
            }
            return $button;
    }

    public function Authentication($table,$tOid,$id){
        $isAdmin = Auth::user()->role === 'Admin';
        $createdByExists = DB::select("SELECT * FROM $table WHERE  created_id =? AND  $tOid =? ", [Auth::user()->id,$id]);

        if( !empty($createdByExists) || $isAdmin){
            return 1;
        }
    }



    
   


}
