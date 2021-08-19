<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement_category_id', 'title', 'body', 'slug'
    ];


    public function category()
    {
        return $this->belongsTo(AnnouncementCategory::class, 'announcement_category_id');
    }
}
