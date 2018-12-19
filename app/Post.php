<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'postID';

    protected $fillable = [
        'title', 'caption', 'price', 'picture', 'userID', 'categoryID'
    ];

    public function category(){
    	return $this->belongsTo('App\Category','categoryID');
    }

    public function user(){
    	return $this->belongsTo('App\User','userID');
    }

    public function detailComment(){
    	return $this->hasMany('App\DetailComment', 'postID');
    }

    public function detailHistory(){
    	return $this->hasMany('App\DetailHistory', 'postID');
    }

    public function detailCart(){
    	return $this->hasMany('App\DetailCart', 'postID');
    }
}
