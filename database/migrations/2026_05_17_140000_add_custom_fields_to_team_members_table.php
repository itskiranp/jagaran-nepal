<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->string('type')->default('committee')->after('position'); // 'committee' or 'staff'
            $table->string('qualification')->nullable()->after('bio');
            $table->string('experience')->nullable()->after('qualification');
            $table->json('specialties')->nullable()->after('experience'); // Array of specialties
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['type', 'qualification', 'experience', 'specialties']);
        });
    }
};
