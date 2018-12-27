<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cookie;
use DB;
use Session;
use App\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
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

    public function logIn(Request $request){
        $email = $request->email;
        $password = $request->password;

        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:8'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }

        $userID = DB::table('users')->where('email','=',$email)->where('password','=',$password)->select('userID')->value('userID');
        $user = User::find($userID);
        
        if($userID == null){
            return redirect()->back()->withErrors("User not found !!!");
        }else{
            $id = $user->userID;
            $name = $user->name;
            $email = $user->email;
            $password = $user->password;
            $pp = $user->profilePicture;
            $role = $user->isAdmin;

            $data['email'] = $email;
            $data['password'] = $password;

            Cookie::queue('data', json_encode($data), 60);
            //cara get cookie -> json_decode(Cookie::get('data'));
            
            Session::put('userID', $id);
            Session::put('name', $name);
            Session::put('profilePicture', $pp);
            Session::put('isAdmin', $role);

            return redirect('/');
        }
        
    }

    public function logOut(){
        Session::flush();
        return redirect()->back();
    }
}
