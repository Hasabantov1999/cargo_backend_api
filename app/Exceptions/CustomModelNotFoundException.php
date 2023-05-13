<?php

namespace App\Exceptions;

use Exception;

class CustomModelNotFoundException extends Exception
{
   static public function render()
    {
        return response()->json([
            'message' => 'Böyle bir kayıt bulunamadı'
        ], 404);
    }
}


class NotFoundModal{
   static public function show(){
        return response()->json([
            'message' => 'Custom error message here'
        ], 404);
    }
}