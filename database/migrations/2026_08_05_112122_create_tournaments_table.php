<?php

// Migration pour la table tournaments : tournois e-sport
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('game');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['upcoming', 'ongoing', 'finished'])->default('upcoming');
            $table->text('description')->nullable();
            $table->string('prize_pool')->nullable();
            $table->integer('participants_count')->default(0);
            $table->integer('max_participants')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
