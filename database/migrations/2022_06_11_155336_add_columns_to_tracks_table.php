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
        Schema::table('tracks', function (Blueprint $table) {
            $table->foreignId('composer_id')->nullable();
            $table->string('spotify')->nullable();
            $table->string('yt_official')->nullable();
            $table->string('yt_unofficial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->dropColumn('composer_id');
            $table->dropColumn('spotify');
            $table->dropColumn('yt_official');
            $table->dropColumn('yt_unofficial');
        });
    }
};
