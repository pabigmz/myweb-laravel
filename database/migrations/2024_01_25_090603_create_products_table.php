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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('cost',8,2); #มีทศนิยม , จำนวนตำแหน่ง
            $table->decimal('price',8,2);
            $table->decimal('quantity');
            $table->string('image')->nullable();
            $table->bigInteger('product_types_id')->unsigned(); #ใส่เพื่อให้รู้ว่าเป็น foreignkey
            $table->timestamps();
            $table->foreign('product_types_id')->references('id')->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
