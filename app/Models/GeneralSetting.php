<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'footer_logo',
        'favicon',
    ];
    
}
