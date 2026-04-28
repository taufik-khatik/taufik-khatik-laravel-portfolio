<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        
        'title',
        'description',
        'keywords',

        'og_enabled',
        'og_title',
        'og_description',
        'og_image',

        'twitter_enabled',
        'twitter_title',
        'twitter_description',
        'twitter_image',

        'canonical_url',
        'robots'
    ];
}
