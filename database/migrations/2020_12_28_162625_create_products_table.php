<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_bn_id')->nullable()->constrained('categories');
            $table->foreignId('category_en_id')->nullable()->constrained('categories');
            $table->string('product_name_en');
            $table->string('product_name_bn');
            $table->string('slug_en');
            $table->string('slug_bn');
            $table->string('product_code_en')->nullable();
            $table->string('product_code_bn')->nullable();
            $table->string('color_en')->nullable();
            $table->string('color_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
