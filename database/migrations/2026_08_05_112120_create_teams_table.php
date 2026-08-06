<?php

// Migration pour la table teams : équipes e-sport
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_url')->nullable();
            $table->string('game');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->text('description')->nullable();
            $table->integer('players_count')->nullable();
            $table->integer('ranking')->nullable();
            $table->string('banner_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('owner_id')->nullable(); // user_id
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
