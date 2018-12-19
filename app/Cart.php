<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cartID';

    protected $fillable = [
        'totalPrice', 'userID'
    ];

    public function user(){
    	return $this->belongsTo('App\User','userID');
    }

    public function detailCart(){
    	return $this->hasMany('App\DetailCart','cartID');
    }
}
