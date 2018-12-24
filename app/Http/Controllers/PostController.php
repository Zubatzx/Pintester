<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
use App\Post;
use App\DetailComment;
use App\Category;
use App\Cart;
use App\DetailCart;

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

    public function myPostIndex($id){
        $myposts = DB::table('posts')->join('users', 'posts.userID', '=', 'users.userID')->join('categories', 'posts.categoryID', '=', 'categories.categoryID')->where('posts.userID','=',$id)->select('posts.*','users.name as username','users.profilePicture', 'categories.name as category')->paginate(5);

        return view('myPost', compact('myposts'));
    }

    public function createPostIndex(){
        $categories = Category::all();
        
        return view('createPost', compact('categories'));
    }

    public function addPost(Request $request){
        $validate = Validator::make($request->all(), [
            'title' => 'required|min:20|max:200',
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'price' => 'required|integer',
            'category' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $insert = new Post;
        $insert->title = $request->title;
        $insert->caption = $request->caption;
        $insert->price = $request->price;
        $insert->picture = "";
        $insert->userID = Session::get('userID');
        $insert->categoryID = $request->category;

        $insert->save();
        $lastInsertedID = $insert->postID;

        $image = $request->file('image');
        $filename = 'post'.$lastInsertedID.'.'.$image->getClientOriginalExtension();
        $image->move('assets/images/posts/', $filename);
        $insert->picture = $filename;

        $insert->save();

        return redirect()->route('myPost', session()->get('userID'));
    }

    public function deletePost($id){
        //kacau, jadi fk di table lain, gw dah terlanjut buat jadi males ganti, maapkeun
        $deletePost = Post::find($id)->delete();

        return redirect('/home');
    }

    public function addToCart($user, $id){
        $cart = Cart::where('userID','=', $user)->first();
        $detailCart = DetailCart::where('postID', '=', $id)->get();
        if($detailCart->isEmpty()){
            $post = DB::table('posts')->where('postID','=',$id)->get();
    
            $cart->totalPrice = $cart->totalPrice + $post[0]->price;
            $cart->save();

            $detailCart = new DetailCart();
            $detailCart->cartID = $cart->cartID;
            $detailCart->postID = $id;
            $detailCart->save();

            return redirect()->back();
        }else{
            return redirect()->back()->withErrors("Item sudah ada di cart!!");
        }
    }

    public function addComment($id){
        dd($id);
    }
}
