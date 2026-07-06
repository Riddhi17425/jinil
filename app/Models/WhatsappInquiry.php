<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class WhatsappInquiry extends Model
{
    protected $table = 'WhatsappInquiry';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'message',
        'number',
    ];
    
}