<?php

use App\Common\Definition\Unit;
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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('ingredient_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('description', 500)->nullable();
            $table->text('detail')->nullable();
            $table->integer('total_view')->unsigned()->default(0);
            $table->integer('total_food')->unsigned()->default(0);
            $table->tinyInteger('unit')->unsigned()->default(Unit::Default->value);
            // Ví dụ: món ăn cần 100g đường, 1kg đường 20000đ
            // => unit=g, price_unit = 1, price = 20000/1000 = 20d,
            // tính giá tiền bằng: food_recipe.weight * ingresdients.price_unit * ingresdients.price => 100*1*20 = 2000đ, hiên thị ở front: food_recipe.weight (ingredients.unit)
            $table->integer('price_unit')->default(0);
            $table->integer('price')->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('ingredients');
    }
};
