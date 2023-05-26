<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Volunteer extends Model
{
    use HasFactory, HasApiTokens;
    public function volunteerPosition(){
        return $this->belongsTo(Volunteer_position::class);
    }
}
