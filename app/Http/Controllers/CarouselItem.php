<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarouselItem extends Model
{
    use HasFactory, SoftDeletes;

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
        'is_active' => 'boolean'
    ];
}   