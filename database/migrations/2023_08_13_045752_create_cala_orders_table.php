<?php

use App\Common\Definition\OrderStatus;
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
        Schema::create('cala_orders', function (Blueprint $table) {
            $table->increments('order_id')->unsigned();
            $table->integer('customer_id');
            $table->date('order_date');
            $table->date('delivery_date')->nullable();
            $table->date('paid_date')->nullable();
            $table->integer('total_cost')->default(0);
            $table->integer('total_price')->default(0);
            $table->integer('total_profit')->default(0);
            $table->string('shipping_time')->nullable();
            $table->string('shipping_address')->nullable();
            $table->integer('transporter_id')->nullable();
            $table->string('status')->default(OrderStatus::Pending->value);
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
        Schema::dropIfExists('cala_orders');
    }
};
