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
        Schema::table('airports', function (Blueprint $table) {
            $table->string('picture_path')->nullable();
            $table->string('scenery_link')->nullable();
            $table->string('charts_link')->nullable();
            $table->string('type')->default('free'); // 'free' or 'pay'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airports', function (Blueprint $table) {
            $table->dropColumn(['picture_path', 'scenery_link', 'charts_link', 'type']);
        });
    }
};
