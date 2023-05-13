<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GetCargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;


Route::post('management/login', [AuthController::class, 'login'],);
Route::prefix("management")->group(function () {
    
    Route::post('generate-barcode', [BarcodeController::class, 'createBarcode'],);
    Route::get("cargo", [CargoController::class,'index']);
    Route::get("cargo/{barcode}", [CargoController::class,'show']);
    Route::post("cargo/create", [CargoController::class,'create']);
    Route::post("cargo/update/{barcode}", [CargoController::class,'update']);
    Route::post("cargo/delete/{barcode}", [CargoController::class,'destroy']);
    Route::get("department/get-departments", [DepartmentController::class,'getDepartments']);
    Route::get("department/get-department/{id}", [DepartmentController::class,'getDepartment']);
    Route::post("department/create", [DepartmentController::class,'addDepartment']);
    Route::post("department/update/{id}", [DepartmentController::class,'updateDepartment']);
    Route::post("department/delete/{id}", [DepartmentController::class,'deleteDepartment']);
},)->middleware(["auth:api"]);


Route::get('/cargo', [GetCargo::class, "getCargo"],);



