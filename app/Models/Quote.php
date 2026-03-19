<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];
}
