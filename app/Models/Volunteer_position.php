<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer_position extends Model
{
    use HasFactory;

    public function volunteer(){
        return $this->hasMany(Volunteer::class);
    }
}
