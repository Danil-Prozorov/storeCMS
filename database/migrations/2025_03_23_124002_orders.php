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
        Schema::create('orders',function(Blueprint $table){
            $table->id()->index();
            $table->integer('user_id');
            $table->integer('total_cost_of_order');
            $table->string('order_status');
            $table->integer('courier_id')->nullable();
            $table->boolean('payment_status')->default(false);
            $table->integer('payment_type_id');
            $table->timestamps();
        });

        Schema::create('order_details',function(Blueprint $table){
            $table->id();
            $table->integer('user_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('variation_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_details');
    }
};
