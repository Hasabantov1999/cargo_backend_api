<?php

namespace App\Http\Controllers;

use App\Models\Cargo;


use Illuminate\Http\Request;
use App\Utils\BarcodeGenerator;
use Illuminate\Support\Facades\DB;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        return $this->middleware(['auth:api']);
    }
    public function index()
    {

        $cargos=Cargo::all();
        return response()->json([
            "data"=>$cargos,
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $barcode =BarcodeGenerator::GenerateRandomString();
        $control_model = Cargo::where('barcode',$barcode)->get();
       $barcode_receive= new Cargo();
     
        if($control_model == $barcode_receive->barcode){
            return $this->store($request);
        }
        $field = $request->validate([
            "cargos_name"=>"required|string",
            "customer_name"=>"required|string",
            "customer_lastname"=>"required|string",
            'phone_number'=>'required|min:10|max:10',
            "current_city"=>"required|string",
            "taking_city"=>"required|string",
            "delivery_city"=>"required|string",
            "delivery_department"=>"required|string",
            "taking_department"=>"required|string",
            "address"=>"required|string",
            "price"=>"required|numeric",
        ]);
      
      Cargo::create([
            "cargos_name"=>$field["cargos_name"],
            "customer_name"=>$field["customer_name"],
            "customer_lastname"=>$field["customer_lastname"],
            'phone_number'=>$field['phone_number'],
            "current_department"=>$request->query("current_department"),
            "current_city"=>$field["current_city"],
            "taking_city"=>$field["taking_city"],
            "delivery_city"=>$field["delivery_city"],
            "delivery_department"=>$field["delivery_department"],
            "taking_department"=>$field["taking_department"],
            "address"=>$field["address"],
            "price"=>$field["price"],
            "barcode"=>$barcode
        ]);
        $get_model=Cargo::where("barcode",$barcode)->first();
        return response()->json($get_model,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $barcode)
    {
        $model = Cargo::whereBarcode($barcode)->first();
        return response()->json($model,200);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $barcode)
    {
    
        $control_model = Cargo::whereBarcode($barcode)->first();
  
     
    
        $field = $request->validate([
            "current_city"=>"required|string",
            "current_department"=>"string"
        ]);
      
      $control_model->update([
   

            "current_department"=>$field["current_department"],
            "current_city"=>$field["current_city"],
     
        ]);
        $get_model=Cargo::whereBarcode($barcode)->first();
        return response()->json($control_model,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $barcode)
    {
        $model = Cargo::whereBarcode($barcode)->first();
        if($model){
            $model->delete();
            return response()->json([
                "success"=>"ok",
                "message"=>"Başarıyla Silindi"
            ]);
        }else{
            return response()->json([
                "success"=>"failed",
                "message"=>"Böyle bir kargo bulunamadı"
            ],404);
        }
        
       
    }
}
