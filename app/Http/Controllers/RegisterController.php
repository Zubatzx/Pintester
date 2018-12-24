<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Cart;
use DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
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
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_num|min:8',
            'confirmPassword' => 'required|same:password',
            'gender' => 'required',
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $insert = new User();
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->password = $request->password;
        $insert->gender = $request->gender;
        $insert->profilePicture = "";
        $insert->isAdmin = 0;

        $insert->save();
        $lastInsertedID = $insert->userID;

        $image = $request->file('profilePicture');
        $filename = 'user'.$lastInsertedID.'.'.$image->getClientOriginalExtension();
        $image->move('assets/images/users/', $filename);
        $insert->profilePicture = $filename;

        $insert->save();

        $cart = new Cart();
        $cart->userID = $lastInsertedID;
        $cart->totalPrice = 0;

        $cart->save();
        
        return redirect()->back();
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
