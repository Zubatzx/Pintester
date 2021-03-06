<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Category;
use App\FollowedCategory;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProfile($id)
    {
        //masuk ke profilePage beserta datanya
        $user = User::find($id);

        return view('profile', compact('user'));
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
    public function edit()
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
    public function update($id, Request $request)
    {
        //update data yang diedit
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_num|min:8',
            'gender' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $update = User::find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->password = bcrypt($request->password);
        $update->gender = $request->gender;

        $update->save();

        return redirect()->back();
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

    public function indexFollowedCategory($id){
        //masuk ke page followedCategory
        $user = User::find($id);
        $categories = Category::all();
        $followedCategories = FollowedCategory::where('userID', '=', $id)->get(['categoryID']);

        return view('followedCategory', compact('user', 'categories', 'followedCategories'));
    }

    public function addFollowedCategory($id){
        //nambah followedCategory
        $userID = session()->get('userID');
        $categoryID = $id;

        $followedCategory = new FollowedCategory();
        $followedCategory->userID = $userID;
        $followedCategory->categoryID = $categoryID;
        
        $followedCategory->save();
        
        return response()->json("success");
    }

    public function deleteFollowedCategory($id){
        //hapus category yang diikuti
        $userID = session()->get('userID');
        $categoryID = $id;

        $followedCategory = FollowedCategory::where('userID', '=', $userID)->where('categoryID', '=', $categoryID)->delete();

        return response()->json("success");
    }
}
