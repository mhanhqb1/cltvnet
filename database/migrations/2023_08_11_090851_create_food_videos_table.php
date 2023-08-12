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
        Schema::create('food_videos', function (Blueprint $table) {
            $table->increments('food_video_id')->unsigned();
            $table->integer('food_id')->unsigned();
            $table->string('video_name');
            $table->string('slug');
            $table->string('source_id');
            $table->tinyInteger('video_type');
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
        Schema::dropIfExists('food_videos');
    }
};
