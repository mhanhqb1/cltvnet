<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500);
            $table->boolean('type')->default(0); //0: video, 1: article
            $table->string('image')->nullable();
            $table->string('thumb_image')->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->integer('cate_id')->default(0);
            $table->integer('total_view')->default(0);
            $table->integer('total_like')->default(0);
            $table->integer('total_dislike')->default(0);
            $table->string('video_lenght')->nullable();
            $table->string('source_id');
            $table->string('source_type');
            $table->integer('parent_id')->default(0);
            $table->integer('position')->default(0);
            $table->text('tags')->nullable();
            $table->string('stream_url', 500)->nullable();
            $table->integer('author_id')->default(0);
            $table->timestamp('crawl_at')->nullable();
            $table->timestamp('stream_crawl_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['source_id', 'source_type'], 'unique_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
