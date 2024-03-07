<?php

use App\Common\Definition\TiktokType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToTiktokVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tiktok_videos', function (Blueprint $table) {
            $table->enum('type', TiktokType::values())->default(TiktokType::None->value)->after('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tiktok_videos', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
