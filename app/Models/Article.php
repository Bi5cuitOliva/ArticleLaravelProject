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
        'slug', 
    ];

    // Generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            // Automatically generate slug when creating an article
            $article->slug = Str::slug($article->title);
        });
    }

    // URL accessor for article detail page
    public function getUrlAttribute()
    {
        // Define a custom URL for the article
        return route('articles.show', $this->slug);
    }
}
