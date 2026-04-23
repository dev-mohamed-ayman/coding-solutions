<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_page_id')->constrained('content_pages')->cascadeOnDelete();
            $table->string('section_key', 160);
            $table->string('title', 160);
            $table->json('schema')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['content_page_id', 'section_key']);
            $table->index(['content_page_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_sections');
    }
};
