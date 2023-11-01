<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Patients extends Model
{
    use HasFactory;
    use Searchable;

    public function users()
    {
        return $this->hasMany ('App\Models\User', 'user_id');
    }
    public function nameuser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
