<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailymotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailymotions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('source_id');
            $table->tinyInteger('type')->default(0);//0:user, 1:playlist
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
        Schema::dropIfExists('dailymotions');
    }
}
