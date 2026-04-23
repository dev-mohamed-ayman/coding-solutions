<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_page_id')->constrained('content_pages')->cascadeOnDelete();
            $table->string('zone', 160);
            $table->string('type', 120)->default('card');
            $table->json('payload')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['content_page_id', 'zone', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_blocks');
    }
};
