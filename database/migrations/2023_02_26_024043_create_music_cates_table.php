<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_cates', function (Blueprint $table) {
            $table->id();
            $table->integer('music_id');
            $table->integer('cate_id');
            $table->timestamps();
            $table->unique(['music_id', 'cate_id'], 'unq_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_cates');
    }
}
