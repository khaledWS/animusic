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
        Schema::table('episode_track', function (Blueprint $table) {
            $table->integer('status')->default(0)->comment('0:known, 1:unknown, 2:new');
            $table->integer('type')->default(0)->comment('0:soundtrack, 1:op, 2:ed, 3:preview, 4:midcard');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('episode_track', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('type');
        });
    }
};
