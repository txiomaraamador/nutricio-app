<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Flogs extends Model
{
    use HasFactory;
    use Searchable;


    public function typename()
    {
        return $this->belongsTo('App\Models\Categorys', 'type_id');
    }
    //relacion muchos a muchos
    public function foods(){
        return $this->belongsToMany('App\Models\Foods');
    }
    
}
