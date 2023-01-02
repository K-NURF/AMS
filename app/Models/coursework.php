<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coursework extends Model
{

    use HasFactory;
    protected $fillable = [
        'classes_id',
        'topic',
        'file',
        
        
    ];
}
