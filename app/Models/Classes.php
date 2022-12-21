<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function units(){
        return $this->belongsTo(Units::class, 'units_id');
    }

    public function student_classes(){
        return $this->hasMany(Student_Classes::class, 'student_classes_id');
    }
}
