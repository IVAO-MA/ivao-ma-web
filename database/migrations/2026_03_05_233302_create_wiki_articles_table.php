<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wiki_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manual_id')->constrained('wiki_manuals')->cascadeOnDelete();
            $table->json('title');
            $table->string('slug')->unique();
            $table->json('content');
            $table->boolean('is_published')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki_articles');
    }
};
