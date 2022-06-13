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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('title_id')->nullable()->comment('season ID');
            $table->string('composer')->nullable();
            $table->date('date_released')->nullable();
            $table->integer('number_of_tracks')->nullable();
            $table->integer('album_length')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('active')->default(false);;
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
        Schema::dropIfExists('albums');
    }
};
