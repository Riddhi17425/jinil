<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndCategory extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = "indcategory";

    protected $fillable = [

        'indcategory',

        'indcategory_title',

        'status', 

        'cat_description',

        'url',

        'icon_image',

        'meta_title',

        'meta_description',

        'faqs',

    ];

    protected $casts = [
    'faqs' => 'array', 
    ];

}
