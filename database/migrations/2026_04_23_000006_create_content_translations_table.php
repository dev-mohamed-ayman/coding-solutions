<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->foreignId('content_section_id')->nullable()->constrained('content_sections')->cascadeOnDelete();
            $table->foreignId('content_block_id')->nullable()->constrained('content_blocks')->cascadeOnDelete();
            $table->string('field', 190);
            $table->text('value')->nullable();
            $table->timestamps();

            $table->index(['language_id', 'field']);
            $table->index(['content_section_id', 'language_id']);
            $table->index(['content_block_id', 'language_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_translations');
    }
};
