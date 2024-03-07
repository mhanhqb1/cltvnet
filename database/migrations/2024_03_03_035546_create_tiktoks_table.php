<?php

use App\Common\Definition\TiktokType;
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
        Schema::create('tiktoks', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 55)->unique();
            $table->string('name')->nullable();
            $table->string('tiktok_id')->nullable();
            $table->string('image', 500)->nullable();
            $table->enum('type', TiktokType::values())->default(TiktokType::None->value);
            $table->date('crawl_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiktoks');
    }
};
