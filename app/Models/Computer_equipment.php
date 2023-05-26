<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer_equipment extends Model
{
    use HasFactory;
    public function applications(){
        return $this->belongsToMany(Application::class);
    }

    public function application(){
        return $this->belongsToMany(Application::class,'application_computer_equipments');
    }
    public function applicationType(){
        return $this->belongsTo(Application_type::class);
    }
}
