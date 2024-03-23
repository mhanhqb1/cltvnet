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
        Schema::table('cala_orders', function (Blueprint $table) {
            $table->string('product_name')->nullable();
            $table->string('product_image')->nullable();
            $table->integer('ship_cost')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cala_orders', function (Blueprint $table) {
            $table->dropColumn([
                'product_name',
                'product_image',
                'ship_cost',
            ]);
        });
    }
};
