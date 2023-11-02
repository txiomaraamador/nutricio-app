<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Flogs extends Model
{
    use HasFactory;
    use Searchable;

    
    public function namepatients()
    {
        return $this->belongsTo('App\Models\Patients', 'patient_id');
    }
    public function patients()
    {
        return $this->hasMany ('App\Models\Patients', 'patient_id');
    }

}
