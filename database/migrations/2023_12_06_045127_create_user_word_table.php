<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_word', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('word_id')->constrained();
            $table->string('method');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_words');
    }
};
