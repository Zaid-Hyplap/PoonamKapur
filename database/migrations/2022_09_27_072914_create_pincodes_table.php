<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pincodes', function (Blueprint $table) {
            $table->id();
            $table->integer('pincode')->nullable();
            $table->string('areaName')->nullable();
            $table->boolean('breakFastFlag')->nullable();
            $table->boolean('lunchFlag')->nullable();
            $table->boolean('snackFlag')->nullable();
            $table->boolean('dinnerFlag')->nullable();
            $table->boolean('alaCartFlag')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('deleteId')->default(0);
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
        Schema::dropIfExists('pincodes');
    }
};
