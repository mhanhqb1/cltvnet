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
        Schema::create('food_recipes', function (Blueprint $table) {
            $table->increments('food_recipe_id')->unsigned();
            $table->integer('food_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            $table->float('weight')->unsigned();
            $table->tinyInteger('recipe_type')->unsigned()->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('food_recipes');
    }
};
