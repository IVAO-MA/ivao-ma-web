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
        Schema::table('virtual_airlines', function (Blueprint $table) {
            $table->string('logo_path')->nullable()->after('logo_url');
            $table->boolean('is_active')->default(true)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('virtual_airlines', function (Blueprint $table) {
            $table->dropColumn(['logo_path', 'is_active']);
        });
    }
};
