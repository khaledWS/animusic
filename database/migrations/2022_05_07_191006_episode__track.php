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
        Schema::create('episode_track', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('episode_id');
            $table->foreignId('track_id')->nullable();
            $table->integer('start');
            $table->integer('end');
            $table->string('notes')->nullable();
            $table->boolean('new')->default(false)->comment('if the track is new or not');
            $table->boolean('unknown')->default(false)->comment('if the track is known or not');
            $table->boolean('midcard')->default(false);
            $table->boolean('opening')->default(false);
            $table->boolean('ending')->default(false);
            $table->boolean('preview')->default(false);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('episode_track');
    }
};
