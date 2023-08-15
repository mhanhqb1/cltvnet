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
        Schema::create('cala_customers', function (Blueprint $table) {
            $table->increments('customer_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('facebook')->nullable();
            $table->string('zalo')->nullable();
            $table->string('shipping_address')->nullable();
            $table->integer('transporter_id')->nullable();
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
        Schema::dropIfExists('cala_customers');
    }
};
