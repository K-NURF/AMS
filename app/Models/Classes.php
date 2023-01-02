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

    public function student__classes(){
        return $this->hasMany(student__classes::class, 'student__classes_id');
    }
}
