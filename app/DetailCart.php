<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailCart extends Model
{
    protected $primaryKey = 'detailCartID';

    protected $fillable = [
        'cartID', 'postID'
    ];

    public function cart(){
    	return $this->belongsTo('App\Cart','cartID');
    }

    public function post(){
    	return $this->belongsTo('App\Post','postID');
    }
}
