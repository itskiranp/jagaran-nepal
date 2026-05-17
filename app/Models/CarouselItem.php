<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'caption',
        'description',
        'link_url',
        'link_text',
        'is_active',
        'order'
    ];

    protected $casts = [
        'image_path' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];
}