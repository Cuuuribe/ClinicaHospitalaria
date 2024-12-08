<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  
     // Relación con especialidades
     public function specialty()
     {
         return $this->belongsTo(Specialty::class);
     }
 
     // Relación con las citas médicas
     public function appointments()
     {
         return $this->hasMany(Appointment::class);
     }
 
     // Relación con horarios
     public function schedules()
     {
         return $this->hasMany(Schedule::class);
     }


}
