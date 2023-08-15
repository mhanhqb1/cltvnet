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
        Schema::create('cala_transporters', function (Blueprint $table) {
            $table->increments('transporter_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('time_start');
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
        Schema::dropIfExists('cala_transporters');
    }
};
