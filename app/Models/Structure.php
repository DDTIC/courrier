<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    public $fillable=['nomStruct','sigleStruct','adrStruct','emailStruct','telStruct'];

    public function directions(){
        return $this->hasMany('App\Models\Directions');
    }
}
