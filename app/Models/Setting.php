<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_title',
        'website_logo_dark',
        'website_logo_light',
        'website_logo_small',
        'website_favicon',
        'meta_title',
        'meta_description',
        'meta_tag',
        'currency_id',
        'address',
        'phone',
        'email',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'github',
        'who_we_are',
        'about',
        'hotline',
        'training_cost',
        'training_title',
        'work_hours',
        'who_we_are_img',
        'about_img'
    ];
}
