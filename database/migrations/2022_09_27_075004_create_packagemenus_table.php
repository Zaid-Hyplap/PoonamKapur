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
        Schema::create('packagemenus', function (Blueprint $table) {
            $table->id();
            $table->String('packageUId')->nullable();
            $table->integer('day')->nullable();
            $table->string('breakFast')->nullable();
            $table->string('lunch')->nullable();
            $table->string('snack')->nullable();
            $table->string('dinner')->nullable();
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
        Schema::dropIfExists('packagemenus');
    }
};
