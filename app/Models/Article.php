<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'content',
        'image_path',
    ];

    // Generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    // URL accessor for article detail page
    public function getUrlAttribute()
    {
        return route('articles.show', $this->slug);
    }
}
