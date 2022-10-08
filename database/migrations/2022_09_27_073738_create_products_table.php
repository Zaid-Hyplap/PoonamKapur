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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('UID')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('discountedPrice')->nullable();
            $table->string('mealTime')->nullable();
            $table->integer('goalId')->nullable();
            $table->integer('mealTypeId')->nullable();
            $table->integer('categoryId')->nullable();
            $table->integer('subCategoryId')->nullable();
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
        Schema::dropIfExists('products');
    }
};
