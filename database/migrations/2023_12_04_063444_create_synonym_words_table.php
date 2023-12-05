<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('synonym_words', function (Blueprint $table) {
            $table->foreignId('word_id')->constrained()->cascadeOnDelete();
            $table->foreignId('synonym_id')->constrained('words')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('synonym_words');
    }
};
