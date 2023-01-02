<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grades_model extends Model
{
  
    use HasFactory;
    protected $fillable = [
        
        'student_id',
        'lecturer_id',
        'units_id',
        'units_lists_id'
    ];
}
