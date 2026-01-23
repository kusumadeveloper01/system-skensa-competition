<?php

use App\Models\CompetitionType;
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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CompetitionType::class)->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('registration_start_date');
            $table->date('registration_end_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('registration_link');
            $table->string('location');
            $table->string('quota');
            $table->string('fee');
            $table->string('status');
            $table->string('poster');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
