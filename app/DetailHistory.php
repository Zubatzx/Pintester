<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailHistory extends Model
{
    protected $primaryKey = 'detailHistoryID';

    protected $fillable = [
        'historyID', 'postID'
    ];

    public function history(){
    	return $this->belongsTo('App\History','historyID');
    }

    public function post(){
    	return $this->belongsTo('App\Post','postID');
    }
}
