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
        Schema::create('rawmateriallogs', function (Blueprint $table) {
            $table->id();
            $table->string('UId')->nullable();
            $table->string('qty')->nullable();
            $table->string('unit')->nullable();
            $table->string('systemData')->nullable();
            $table->string('systemTime')->nullable();
            $table->string('addedBy')->nullable();
            $table->string('cause')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('rawmateriallogs');
    }
};
