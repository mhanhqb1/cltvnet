<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMp3UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mp3_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('image', 500)->nullable();
            $table->string('mp3_user_name', 20)->nullable();
            $table->longText('mp3_cookie')->nullable();
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
        Schema::dropIfExists('mp3_users');
    }
}
