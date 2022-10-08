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
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->integer('mealTypeId')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->boolean('alaCartFlag')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('addons');
    }
};
