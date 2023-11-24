<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Foods extends Model
{
    use HasFactory;
    use Searchable;

    public function patients()
    {
        return $this->hasMany ('App\Models\Patients', 'patient_id');
    }
    public function namepatients()
    {
        return $this->belongsTo('App\Models\Patients', 'patient_id');
    }
    //relacion muchos a muchos
    public function flogs(){
        return $this->belongsToMany('App\Models\Flogs')->withPivot('cantidad');
    }
}
