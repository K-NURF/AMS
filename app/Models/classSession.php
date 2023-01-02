<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_time',
        'end_time',
        'classes_id',
        'date',
    ];
}
