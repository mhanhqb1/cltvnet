<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTopBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_top_banners', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->string('btn_1_text');
            $table->string('btn_1_url');
            $table->string('btn_2_text');
            $table->string('btn_2_url');
            $table->string('image');
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
        Schema::dropIfExists('home_top_banners');
    }
}
