<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'slug',
        'description',
        'file_path',
        'external_link',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (is_null($model->description)) {
                $model->description = '';
            }
            if (is_null($model->published_at)) {
                $model->published_at = now();
            }
            if (empty($model->slug)) {
                $model->slug = \Illuminate\Support\Str::slug($model->title);
            }
        });
    }
}