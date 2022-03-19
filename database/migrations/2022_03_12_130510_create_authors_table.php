<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('total_video')->default(0);
            $table->text('description')->nullable();
            $table->string('source_type', 30)->nullable();//youtube, twitter
            $table->string('source_id', 100)->nullable();
            $table->date('crawl_at')->nullable();
            $table->timestamps();
            $table->unique(['source_id', 'source_type'], 'unique_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
