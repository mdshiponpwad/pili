<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('order_no')->unique();
            $table->decimal('total_quantity', 16)->nullable()->default(0);
            $table->decimal('sub_total', 16, 2)->nullable()->default(0);
            $table->decimal('shipping_cost', 16, 2)->nullable()->default(0);
            $table->decimal('discount_amount', 16, 2)->nullable()->default(0);
            $table->decimal('paid_amount', 16, 2)->nullable()->default(0);
            $table->decimal('grand_total', 16, 2)->virtualAs('sub_total + shipping_cost - discount_amount');                                
            $table->decimal('due_amount', 16, 2)->virtualAs('grand_total - paid_amount');
            $table->string('status')->nullable()->comment('Pending, Confirmed, Delivery on going, Delivered, Return, Cancelled');
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
        Schema::dropIfExists('orders');
    }
}
