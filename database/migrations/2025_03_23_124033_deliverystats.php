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
        Schema::create('delivery_stats',function(Blueprint $table){
            $table->id();
            $table->integer('order_id');
            $table->integer('courier_id');
            $table->integer('order_status_id');
            $table->string('payment_type');
            $table->integer('order_payment_amount');
            $table->boolean('payment_status')->default(false);
            $table->integer('payment_for_delivery');
            $table->timestamps();
        });

        Schema::create('courier_statistics',function(Blueprint $table){
            $table->id();
            $table->integer('courier_id')->unique();
            $table->integer('completed_successfully');
            $table->integer('failed_orders');
            $table->integer('total_earn_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_stats');
        Schema::dropIfExists('courier_statistics');
    }
};
