<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('credits')->default(0)->after('password');
            $table->boolean('email_notifications')->default(true)->after('credits');
            $table->boolean('marketing_emails')->default(false)->after('email_notifications');
            $table->boolean('billing_alerts')->default(true)->after('marketing_emails');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['credits', 'email_notifications', 'marketing_emails', 'billing_alerts']);
        });
    }
};