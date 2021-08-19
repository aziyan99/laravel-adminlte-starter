<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_category_id', 'user_id', 'title', 'thumbnail', 'body', 'slug', 'views'
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }

    public function writer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
