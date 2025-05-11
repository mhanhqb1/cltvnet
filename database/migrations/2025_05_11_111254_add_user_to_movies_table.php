<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->integer('user_id')->default(0);
            $table->string('danfra_url')->nullable();
            $table->dateTime('danfra_crawl_at')->nullable();
            $table->integer('new_chapter')->default(0);
            $table->integer('danfra_new_chapter')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn([
                'user_id',
                'danfra_url',
                'danfra_crawl_at',
                'new_chapter',
                'danfra_new_chapter',
            ]);
        });
    }
}
