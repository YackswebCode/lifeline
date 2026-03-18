<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'organization',
        'password',
        'credits',
        'email_notifications',
        'marketing_emails',
        'billing_alerts',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'email_notifications' => 'boolean',
            'marketing_emails' => 'boolean',
            'billing_alerts' => 'boolean',
        ];
    }

    // Notification preferences accessors
    public function wantsEmailNotifications(): bool
    {
        return $this->email_notifications;
    }

    public function wantsMarketingEmails(): bool
    {
        return $this->marketing_emails;
    }

    public function wantsBillingAlerts(): bool
    {
        return $this->billing_alerts;
    }
}