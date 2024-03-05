<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tiktok_videos', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 55);
            $table->string('tiktok_id')->unique();
            $table->string('image', 500)->nullable();
            $table->text('description')->nullable();
            $table->text('tag')->nullable();
            $table->date('crawl_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiktok_videos');
    }
};
