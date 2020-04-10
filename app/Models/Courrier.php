<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    public $fillable=['idStruct','natCourier','typeCourier','numPiece','destExp','datePiece','objet','observation','dateArrivee','etat'];
    protected $date=['datePiece','dateArrivee'];
    ////Structures d'un Courrier
    public function structures(){
        return $this->belongsTo('App\Models\Structure','idStruct');
    }
}
