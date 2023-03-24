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
        Schema::create('puzzles', function (Blueprint $table) {
            $table->id();
            $table->enum('category',[
                'one',
                'two',
                'three',
                'four',
                'five',
                'six',
                'best'
            ]);
            $table->string('plain_fen');
            $table->enum('color',['w','b']);
            $table->string('castling_rights')->default(' - - ');
            $table->string('num_moves')->default('0 1');
            $table->string('solution')->nullable();
            $table->enum('is_active',[1,0]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puzzles');
    }
};
