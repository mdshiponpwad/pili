<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products');
            $table->string('weight_en');
            $table->string('weight_bn');
            $table->string('sku_en')->nullable();
            $table->string('sku_bn')->nullable();
            $table->decimal('sale_price_en')->nullable();
            $table->decimal('sale_price_bn')->nullable();
            $table->decimal('pur_price_en')->nullable();
            $table->decimal('discount_en')->nullable();
            $table->decimal('qty_en')->nullable();
            $table->decimal('stock_en')->nullable();
            $table->decimal('total_price_en')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
