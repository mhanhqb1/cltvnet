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
        Schema::table('cala_customers', function (Blueprint $table) {
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cala_customers', function (Blueprint $table) {
            $table->dropColumn('shipping_phone');
            $table->dropColumn('shipping_name');
        });
    }
};
