<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'computer_equipment_id',
       
    ];
    public function computerEquipment(){
        return $this->belongsToMany(Computer_equipment::class, 'application_computer_equipments', 'computer_equipment_id', 'application_id');
    }

    public function computerEquipments(){
        return $this->belongsToMany(Computer_equipment::class,'application_computer_equipments');
    }

    public function applicationType(){
        return $this->belongsTo(Application_type::class);
    }
    
    public function applicationStatus(){
        return $this->belongsTo(Application_status::class);
    }

    public function donation(){
        return $this->hasOne(Donation::class);
    }
}
