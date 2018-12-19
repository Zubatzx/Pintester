<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowedCategory extends Model
{
    protected $primaryKey = 'followedCategoryID';

    protected $fillable = [
        'userID', 'categoryID'
    ];

    public function category(){
    	return $this->belongsTo('App\Category','categoryID');
    }

    public function user(){
    	rerturn $this->belongsTo('App\User','userID');
    }
}
