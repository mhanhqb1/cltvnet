<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_cates', function (Blueprint $table) {
            $table->id();
            $table->integer('cate_id');
            $table->integer('movie_id');
            $table->timestamps();
            $table->unique(['cate_id', 'movie_id'], 'uq_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_cates');
    }
}
