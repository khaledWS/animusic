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
            $table->string('date_released')->nullable();
            $table->string('number_of_tracks')->nullable();
            $table->string('album_length')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('order')->nullable();
            $table->boolean('active')->default(true);;
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
