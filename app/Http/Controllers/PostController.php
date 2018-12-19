<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\DetailComment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = DB::table('posts')->join('users', 'posts.userID', '=', 'users.userID')->join('categories', 'posts.categoryID', '=', 'categories.categoryID')->where('posts.postID','=',$id)->select('posts.*','users.name as username','users.profilePicture', 'categories.name as category')->get();

        $comments = DB::table('detail_comments')->join('posts', 'detail_comments.postID', '=', 'posts.postID')->join('users', 'users.userID', '=', 'detail_comments.userID')->where('detail_comments.postID','=',$id)->select('detail_comments.comment','users.profilePicture', 'users.name')->get();
        
        return view('postDetail', compact('post', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
