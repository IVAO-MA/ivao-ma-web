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
        Schema::table('announcements', function (Blueprint $table) {
            // Add new columns
            $table->string('title')->nullable();
            $table->enum('type', ['news', 'announcement'])->default('announcement');
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_pinned')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            // Drop old columns if they exist
            if (Schema::hasColumn('announcements', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });

        // Update existing records to have a title
        DB::table('announcements')->whereNull('title')->update([
            'title' => 'Announcement',
            'published_at' => now(),
        ]);

        // Make title required after setting defaults
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn(['title', 'type', 'published_at', 'is_pinned', 'created_by']);
            $table->boolean('is_active')->default(true);
        });
    }
};
