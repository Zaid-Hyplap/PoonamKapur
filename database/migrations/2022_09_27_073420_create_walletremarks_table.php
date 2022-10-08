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
        Schema::create('walletremarks', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->nullable();
            $table->string('trxId')->nullable();
            $table->string('remark')->nullable();
            $table->string('status')->default('delivered');
            $table->string('trxFor')->nullable();
            $table->string('debit/credit')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('walletremarks');
    }
};
