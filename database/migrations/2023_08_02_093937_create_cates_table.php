<?php

use App\Common\Definition\CateType;
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
        Schema::create('cates', function (Blueprint $table) {
            $table->increments('cate_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('description', 500)->nullable();
            $table->tinyInteger('type')->unsigned()->default(CateType::Food->value);
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
        Schema::dropIfExists('cates');
    }
};
