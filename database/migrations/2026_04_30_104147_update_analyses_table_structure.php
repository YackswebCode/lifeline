<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('analyses', function (Blueprint $table) {
            // Add missing columns if not exist
            if (!Schema::hasColumn('analyses', 'user_id')) {
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            }

            if (!Schema::hasColumn('analyses', 'image')) {
                $table->string('image')->nullable();
            }

            if (!Schema::hasColumn('analyses', 'summary')) {
                $table->text('summary')->nullable();
            }

            if (!Schema::hasColumn('analyses', 'confidence')) {
                $table->integer('confidence')->nullable();
            }

            if (!Schema::hasColumn('analyses', 'status')) {
                $table->string('status')->default('processing');
            }
        });
    }

    public function down(): void
    {
        Schema::table('analyses', function (Blueprint $table) {
            $table->dropColumn([
                'image',
                'summary',
                'confidence',
                'status'
            ]);
        });
    }
};