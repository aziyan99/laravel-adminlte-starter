<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name', 'logo', 'email', 'phone_number', 'address', 'visi', 'misi', 'front_image', 'facebook', 'youtube', 'instagram', 'twitter'
    ];
}
