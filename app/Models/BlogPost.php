<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image_path',
        'published_at',
        'is_published'
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (is_null($model->excerpt)) {
                $model->excerpt = substr(strip_tags($model->content), 0, 150);
            }
            if (is_null($model->image_path)) {
                $model->image_path = '';
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