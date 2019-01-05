<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Category;

class manageController extends Controller
{
    public function indexUser(){
        //masuk ke page manageUser
    	$users = User::all();
    	
    	return view('manageUser', compact('users'));
    }

    public function indexEditUser($id){
        //masuk ke page editUser beserta data user yang diedit
    	$user = User::find($id);

    	return view('editUser', compact('user'));
    }

    public function saveEditedUser($id, Request $request){
        //save data user yang diedit
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->back();
    }

    public function deleteUser($id){
        //hapus user
        $user = User::find($id);
        $user->delete();

        return redirect('/indexUser');
    }

    public function indexCategory(){
        //masuk ke page manageCategory
    	$categories = Category::all();

    	return view('manageCategory', compact('categories'));
    }

    public function indexAddCategory(){
        //masuk ke page addCategory
    	return view('addCategory');
    }

    public function saveNewCategory(Request $request){
        //save new Category
    	$validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect('/indexCategory');
    }

    public function indexEditCategory($id){
        //masuk ke page editCategory dengan data category yang dipilih
    	$category = Category::find($id);

    	return view('editCategory', compact('category'));
    }

    public function saveEditedCategory($id, Request $request){
        //simpen category yang diedit
    	$validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect('/indexCategory');
    }

    public function deleteCategory($id){
        //hapus category
    	$category = Category::find($id);
    	$category->delete();

    	return redirect()->back();
    }
}
