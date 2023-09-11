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
        Schema::create('food_articles', function (Blueprint $table) {
            $table->increments('food_article_id');
            $table->integer('food_id');
            $table->string('article_name')->nullable();
            $table->string('article_url');
            $table->text('article_description')->nullable();
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
        Schema::dropIfExists('food_articles');
    }
};
