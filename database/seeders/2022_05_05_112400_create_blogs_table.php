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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('coverImage')->nullable();
            $table->string('tags')->nullable();
            $table->string('creator')->nullable();
            $table->string('writer')->nullable();
            $table->longText('discription1')->nullable();
            $table->longText('discription2')->nullable();
            $table->string('status')->nullable();
            $table->integer('deleteId')->default(0);
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
        Schema::dropIfExists('blogs');
    }
};
