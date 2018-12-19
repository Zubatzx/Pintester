<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primarKey = 'categoryID';

    protected $fillable = [
        'name'
    ];

    public function followedCategory(){
    	return $this->hasMany('App\FollowedCategory', 'categoryID');
    }

    public function post(){
    	return $this->hasMany('App\Post', 'categoryID');
    }
}
