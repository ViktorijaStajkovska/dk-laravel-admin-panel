<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application_type extends Model
{
    use HasFactory;
    public function application(){
        return $this->hasOne(Application::class);
    }

    public function computerEquipment(){
        return $this->hasOne(Computer_ecuipment::class);
    }
}
