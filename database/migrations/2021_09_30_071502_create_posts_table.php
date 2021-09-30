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
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->integer('cate_id')->default(0);
            $table->integer('parent_id')->nullable();
            $table->boolean('is_hot')->default(0);
            $table->boolean('is_18')->default(0);
            $table->boolean('type')->default(0);// 0: single, 1: series
            $table->boolean('status')->default(0);
            $table->string('source_type', 255)->nullable();
            $table->text('source_url')->nullable();
            $table->string('source_id', 255)->nullable();
            $table->string('stream_url')->nullable();
            $table->date('crawl_at')->nullable();
            $table->integer('stream_crawl')->nullable();
            $table->timestamps();
            $table->unique(['source_id', 'source_type'], 'source_unique');
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
