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
        Schema::create('products',function(Blueprint $table){
            $table->id();
            $table->string('product_name')->unique()->index();
            $table->integer('product_price');
            $table->integer('total_amount');
            $table->text('description');
            $table->string('product_picture_url');
            $table->string('components');
            $table->boolean('available')->default(true);
            $table->string('relative_products');
            $table->boolean('available_as_relative');
            $table->integer('sales_percent')->default(0);
            $table->timestamps();
        });

        Schema::create('products_variants',function (Blueprint $table){
            $table->integer('product_id');
            $table->string('product_variant_name');
            $table->string('product_variant_description');
            $table->string('product_variant_visualisation_url',560);
            $table->string('components');
            $table->integer('variant_amount');
            $table->integer('variant_price');
            $table->integer('sales_percent')->default(0);
            $table->boolean('available');
        });

        Schema::create('products_seo',function(Bluprint $table){
            $table->id();
            $table->integer('product_id')->unique();
            $table->string('seo_title',256);
            $table->string('seo_description',562);
            $table->string('seo_keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_variants');
        Schema::dropIfExists('products_seo');
    }
};
