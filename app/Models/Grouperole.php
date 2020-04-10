<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grouperole extends Model
{
    public $fillable=['idGroupe','idRole'];
    public $timestamps=false;
}
