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
        Schema::create('carts',function(Blueprint $table){
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('product_option_id')->nullable();
            $table->integer('amount');
            $table->string('product_unique_features')->nullable();
            $table->string('size');
            $table->string('product_order_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
