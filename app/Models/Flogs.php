<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flogs extends Model
{
    use HasFactory;

    public function typename()
    {
        return $this->belongsTo('App\Models\Categorys', 'type_id');
    }
    //relacion muchos a muchos
    public function foods(){
        return $this->belongsToMany('App\Models\Foods');
    }
    
}
