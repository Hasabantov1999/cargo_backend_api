<?php
namespace App\Utils;
class BarcodeGenerator{
  static  function GenerateRandomString() {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
    
        for ($i = 0; $i < 8; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $string;
    }
}