<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Author extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'designation',
        'years_of_experience',
        'social_media_name',
        'social_media',
        'description',
        'main_image',
        'social_media_image',
        'thumbnail_image',
        'is_active',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id');
    }
}