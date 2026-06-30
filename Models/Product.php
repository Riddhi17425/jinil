<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "product";

    protected $fillable = [
        'title',
        'title_brief',
        'url',
        'name',
        'service_note',
        'working_principal_desc',
        'configuration_title',
        'configuration_description',
        'industries',
        'front_image',
        'short_description',
        'meta_title',
        'meta_description',
        'category_id',
        // Blast Wheels
        'blast_wheels_image',
        'blast_wheels',           // JSON: [{title, desc}]
        // Main Components
        'main_components',        // JSON: [{title, desc}]
        // Technical Specifications
        'tech_specifications',    // JSON: [{parameter, specifications:[]}]
        // Applications
        'application_desc',
        'applications',           // JSON: [string]
        // Advantages
        'advantages_desc',
        'advantages',             // JSON: [string]
        // Design Features
        'design_features_desc',
        'design_features',        // JSON: [string]
        // Selection Guidelines
        'selection_guidelines_desc',
        'selection_guidelines',   // JSON: [string]
        // Optional Features
        'optional_features_desc',
        'optional_features',   // JSON: [string]
        // Operational Accessories
        'operational_accessories',// JSON: [{title, desc}]
        // FAQs
        'faqs',                   // JSON: [{question, answer}]
    ];

    protected $casts = [
        'blast_wheels'           => 'array',
        'main_components'        => 'array',
        'tech_specifications'    => 'array',
        'applications'           => 'array',
        'advantages'             => 'array',
        'design_features'        => 'array',
        'selection_guidelines'   => 'array',
        'optional_features'   => 'array',
        'operational_accessories'=> 'array',
        'faqs'                   => 'array',
        'industries'             => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}