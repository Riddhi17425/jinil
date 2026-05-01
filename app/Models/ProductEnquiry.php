<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductEnquiry extends Model
{
    protected $table = 'product_enquiries';

    protected $fillable = [
        'product_name',
        'name',
        'company_name',
        'contact',
        'email',
        'state',
        'city',
        'message'
    ];
}
