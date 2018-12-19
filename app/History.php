<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $primaryKey = 'historyID';

    protected $fillable = [
        'totalPrice', 'transactionDate', 'userID'
    ];

    public function user(){
    	return $this->belongsTo('App\User','userID');
    }

    public function detailHistory(){
    	return $this->hasMany('App\DetailHistory','historyID');
    }
}
