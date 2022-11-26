<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_cates', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->integer('cate_id');
            $table->timestamps();
            $table->unique(['post_id', 'cate_id'], 'unq_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_cates');
    }
}
