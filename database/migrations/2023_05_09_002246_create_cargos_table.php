<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string("cargos_name");
            $table->string("barcode");
            $table->string("customer_name");
            $table->string("customer_lastname");
            $table->string("current_city");
            $table->string("current_department")->nullable();
            $table->string("delivery_city");
            $table->string("taking_city");
            $table->string("delivery_department");
            $table->string("taking_department");
            $table->string("address");
            $table->string('phone_number');
            $table->double("price");
            $table->timestamps();


            // $table->foreign("barcode_id")->references("id")->on("barcodes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
