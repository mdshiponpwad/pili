<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('logo');
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('email')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_bn')->nullable();
            $table->string('contact_en')->nullable();
            $table->string('contact_bn')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitt_link')->nullable();
            $table->string('tube_link')->nullable();
            $table->string('insta_link')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
