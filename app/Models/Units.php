<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $fillable = [
        'units_list_id',
        'course',
        'semester',
        'name',
    ];

    public function classes() {
        return $this->hasMany(Classes::class, 'classes_id');
    }
}
