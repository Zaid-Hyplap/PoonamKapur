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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->nullable();
            $table->integer('dieticianId')->nullable();
            $table->date('consultDate')->nullable();
            $table->time('consultTime')->nullable();
            $table->string('paymentStatus')->nullable();
            $table->string('trxId')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('bookings');
    }
};
