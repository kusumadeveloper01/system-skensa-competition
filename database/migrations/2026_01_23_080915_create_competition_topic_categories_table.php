<?php

use App\Models\Competition;
use App\Models\TopicCategory;
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
        Schema::create('competition_topic_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Competition::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(TopicCategory::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_topic_categories');
    }
};
