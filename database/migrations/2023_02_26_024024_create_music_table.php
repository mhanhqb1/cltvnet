<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('album_id');
            $table->string('image', 500)->nullable();
            $table->string('duration')->nullable();
            $table->integer('total_view')->default(0);
            $table->integer('mp3_user_id')->nullable();
            $table->string('mp3_id')->nullable();
            $table->string('mp3_source')->nullable();
            $table->dateTime('mp3_crawl_at')->nullable();
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
        Schema::dropIfExists('music');
    }
}
