<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Author;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'blog';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    
    protected $casts = [
        'title_description' => 'array',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

}