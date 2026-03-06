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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('rating_atc')->default(0);
            $table->integer('rating_pilot')->default(0);
            $table->string('division')->nullable();
            $table->json('staff')->nullable();
            $table->json('gca')->nullable();
            $table->string('discord')->nullable();
            $table->boolean('notifications_enabled')->default(false);
            $table->text('ivao_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'rating_atc',
                'rating_pilot',
                'division',
                'staff',
                'gca',
                'discord',
                'notifications_enabled',
                'ivao_token',
            ]);
        });
    }
};
