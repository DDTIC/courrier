<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public $fillable=['idFonction','idService','mleAgent','nomAgent','prenomAgent','emailAgent','telAgent'];
}
