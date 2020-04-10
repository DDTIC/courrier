<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierTransmi extends Model
{
	public $fillable=['idCourier','idAgent','idCourierTransmis','typeCourier','dateTransmission','transmis','actuel','observation'];
    protected $date=['dateTransmission'];
    
    public function courriers(){
        return $this->belongsTo('App\Models\Courrier','idCourier');
    }

    public function agents(){
        return $this->belongsTo('App\Models\Agent','idAgent');
    }

}
