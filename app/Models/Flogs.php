<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flogs extends Model
{
    use HasFactory;

    //relacion muchos a muchos
    public function foods(){
        return $this->belongsToMany('App\Models\Foods');
    }
    
}
