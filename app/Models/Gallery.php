<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug'
    ];

    public function getImageCountAttribute()
    {
        $images = GalleryDetail::where('gallery_id', $this->id)->get()->count();
        return $images;
    }

    public function details()
    {
        return $this->hasMany(GalleryDetail::class);
    }
}
