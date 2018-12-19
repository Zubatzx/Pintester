<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailComment extends Model
{
    protected $primaryKey = 'detailCommentID';

    protected $fillable = [
        'comment', 'userID', 'postID'
    ];

    public function post(){
    	return $this->belongsTo('App\Post','postID');
    }

    public function user(){
    	return $this->belongsTo('App\User','userID');
    }
}
