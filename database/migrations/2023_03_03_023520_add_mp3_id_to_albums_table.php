<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMp3IdToAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->string('mp3_id')->nullable();
            $table->dateTime('mp3_crawl_at')->nullable();
            $table->integer('mp3_user_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('mp3_id');
            $table->dropColumn('mp3_crawl_at');
            $table->dropColumn('mp3_user_id');
        });
    }
}
