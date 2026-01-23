<?php

use App\Models\CollaborativePartner;
use App\Models\Competition;
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
        Schema::create('competition_collaborative_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Competition::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(CollaborativePartner::class)->constrained()->onDelete('cascade');
            $table->string('role');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_collaborative_partners');
    }
};
