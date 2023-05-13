<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class GetCargo extends Controller
{
    public function getCargo(Request $request){
        $field = $request->validate([
            "barcode"=>"required|string"
        ]);
        $find_cargo= Cargo::whereBarcode($field["barcode"])->first();
        
        
        if($find_cargo){
            return response()->json($find_cargo,200);
        }else{
            return response()->json([
                "success"=>"failed",
                "message"=>"Böyle bir kargo bulunamadı",
            ]);
        }
    }
}
