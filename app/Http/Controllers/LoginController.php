<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cookie;
use DB;
use Session;
use App\User;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //masuk ke page login
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
        //function buat login
        $email = $request->email;
        $password = $request->password;

        //validasi input di backend
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:8'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }

        //ambil userID
        $userID = DB::table('users')->where('email','=',$email)->first();        
        
        //kalau user gaada
        if($userID == null){
            return redirect()->back()->withErrors("User not found !!!");
        }else{
            //ambil data lengkap user
            $user = User::find($userID->userID);

            //check password
            $checkPassword = Hash::check($password, $user->password);
            //kalo salah redirect dgn errormsg
            if($checkPassword == false){
                return redirect()->back()->withErrors("Wrong Password !!!");
            }

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
        //flush session buat logout
        Session::flush();
        return redirect()->back();
    }
}
