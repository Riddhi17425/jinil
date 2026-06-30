<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndustryEnquiry extends Model
{
    protected $table = 'industry_enquiries';

    protected $fillable = [
        'industry_name',
        'name',
        'company_name',
        'contact',
        'email',
        'state',
        'city',
        'message'
    ];
}