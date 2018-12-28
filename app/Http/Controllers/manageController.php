<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Category;

class manageController extends Controller
{
    public function indexUser(){
    	$users = User::all();
    	
    	return view('manageUser', compact('users'));
    }

    public function indexEditUser($id){
    	$user = User::find($id);

    	return view('editUser', compact('user'));
    }

    public function saveEditedUser($id, Request $request){
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
        $user = User::find($id);
        $user->delete();

        return redirect('/indexUser');
    }

    public function indexCategory(){
    	$categories = Category::all();

    	return view('manageCategory', compact('categories'));
    }

    public function indexAddCategory(){
    	return view('addCategory');
    }

    public function saveNewCategory(Request $request){
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
    	$category = Category::find($id);

    	return view('editCategory', compact('category'));
    }

    public function saveEditedCategory($id, Request $request){
    	$validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        $categories = Category::all();

    	return view('manageCategory', compact('categories'));
    }

    public function deleteCategory($id){
    	$category = Category::find($id);
    	$category->delete();

    	return redirect()->back();
    }
}
