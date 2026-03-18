<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'credits',
        'amount',
        'reference',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}