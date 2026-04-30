<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $fillable = [
        'user_id',
        'patient_name',
        'tracking_id',
        'image',
        'summary',
        'confidence',
        'status'
    ];
}