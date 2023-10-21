<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flogs extends Model
{
    use HasFactory;

    
    public function patients()
    {
        return $this->belongsTo('App\Models\Patients', 'patient_id');
    }
}
