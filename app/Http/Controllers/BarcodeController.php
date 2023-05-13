<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function createBarcode(){
      $barcode = $this->generateRandomString();
      $barcode_table=Barcode::find($barcode);
      if($barcode_table){
        $this->createBarcode();
        return;
      }
      $model = new Barcode();
      $model->barcode=$barcode;
      $model->save();
      return response()->json([
        "status"=>"ok",
        "message"=>" Barcode created succesfully",
        "barcode"=> $barcode
      ]);
    }

    function generateRandomString() {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
    
        for ($i = 0; $i < 8; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $string;
    }
}
