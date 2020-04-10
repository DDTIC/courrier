<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionCourrier extends Model
{
    protected $fillable=['idCourrier','idUser','action',];
    protected $date=['dateAction'];
}
