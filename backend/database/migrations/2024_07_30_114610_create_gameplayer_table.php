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
    Schema::create('game_player', function (Blueprint $table) {
      $table->id();
      $table->integer('score')->default(0);
      $table->tinyInteger('win')->default(0);
      $table->foreignId('player_id')->constrained()->onDelete('cascade');
      $table->foreignId('game_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('gameplayer');
  }
};
