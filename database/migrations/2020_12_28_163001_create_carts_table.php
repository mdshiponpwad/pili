<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_en_id')->nullable()->constrained('products');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->integer('qty')->default(0);
            $table->string('weight_en')->nullable();
            $table->string('weight_bn')->nullable();
            $table->decimal('profit',8,2)->default(0.00);
            $table->decimal('total',8,2)->default(0.00);
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
        Schema::dropIfExists('carts');
    }
}
