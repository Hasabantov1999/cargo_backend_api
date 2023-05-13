<?php

namespace App\Models;

use App\Models\Barcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model
{
    use HasFactory;
    protected $fillable=[
        "cargos_name",
        "customer_name",
        "customer_lastname",
        "barcode",
        "current_department",
        "current_city",
        "taking_city",
        "delivery_city",
        "delivery_department",
        "taking_department",
        "address",
        'phone_number',
        "price"
        
    ];



}
