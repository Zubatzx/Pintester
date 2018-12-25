<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\History;
use App\DetailHistory;

class ViewController extends Controller
{
    public function index($id){
    	$histories = History::join('users', 'users.userID', '=', 'histories.userID')->where('histories.userID', '=', $id)->get();
    	
    	$historyID = History::where('userID', '=', $id)->select('historyID');
    	$detailHistories = DetailHistory::whereIn('historyID', $historyID)->join('posts', 'posts.postID', '=', 'detail_histories.postID')->get();

    	return view('view', compact('histories', 'detailHistories'));
    }

    public function indexAll(){
    	$histories = DB::table('histories')->join('users', 'users.userID', '=', 'histories.userID')->get();
    	$detailHistories = DetailHistory::join('posts', 'posts.postID', '=', 'detail_histories.postID')->get();
    	
    	return view('view', compact('histories', 'detailHistories'));
    }
}
