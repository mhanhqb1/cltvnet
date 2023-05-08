<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('thumb_image')->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->text('tags')->nullable();
            $table->string('source_id');
            $table->integer('source_type')->default(0);
            $table->dateTime('published_at')->nullable();
            $table->date('crawl_at')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
