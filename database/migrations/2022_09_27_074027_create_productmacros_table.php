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
        Schema::create('productmacros', function (Blueprint $table) {
            $table->id();
            $table->integer('productUId')->nullable();
            $table->integer('addonId')->nullable();
            $table->double('calories')->nullable();
            $table->double('carbs')->default(0);
            $table->double('sugar')->default(0);
            $table->double('fat')->default(0);
            $table->double('protien')->default(0);
            $table->double('zinc')->default(0);
            $table->double('iron')->default(0);
            $table->double('mag')->default(0);
            $table->double('sodium')->default(0);
            $table->double('copper')->default(0);
            $table->double('potasium')->default(0);
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
        Schema::dropIfExists('productmacros');
    }
};
