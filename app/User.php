<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'profilePicture', 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'userID';

    public function followedCategory(){
        return $this->hasMany('App\FollowedCategory', 'userID');
    }

    public function post(){
        return $this->hasMany('App\Post', 'userID');
    }

    public function detailComment(){
        return $this->hasMany('App\DetailComment', 'userID');
    }

    public function history(){
        return $this->hasMany('App\History', 'userID');
    }

    public function cart(){
        return $this->hasMany('App\Cart', 'userID');
    }
}
