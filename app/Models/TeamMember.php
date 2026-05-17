<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'type',          // 'committee' or 'staff'
        'bio',
        'qualification',
        'experience',
        'specialties',   // will be saved as JSON array
        'image_path',
        'is_active',
        'order'
    ];

    protected $casts = [
        'specialties' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (is_null($model->bio)) {
                $model->bio = '';
            }
        });
    }
}
