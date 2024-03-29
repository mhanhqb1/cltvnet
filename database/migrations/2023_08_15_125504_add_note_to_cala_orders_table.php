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
            $table->text('note')->nullable();
            $table->date('shipping_date')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_phone')->nullable();
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
            $table->dropColumn('note');
            $table->dropColumn('shipping_date');
            $table->dropColumn('shipping_name');
            $table->dropColumn('shipping_phone');
        });
    }
};
