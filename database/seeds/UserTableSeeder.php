<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
        	'name' => 'Aditya',
        	'email' => 'adityabudiman@gmail.com',
        	'password' => bcrypt('inginjadisultan'),
        	'gender' => 'Male',
        	'profilePicture' => 'user1.jpg',
        	'isAdmin' => '0'
        ],[
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('adminnnn'),
        	'gender' => 'Male',
        	'profilePicture' => 'user2.jpg',
        	'isAdmin' => '1'
        ],
        [
            'name' => 'Leon',
            'email' => 'leonsama@gmail.com',
            'password' => bcrypt('inginbunuhzombie'),
            'gender' => 'Male',
            'profilePicture' => 'user3.jpg',
            'isAdmin' => '0'
        ],
        [
            'name' => 'Tsukasa',
            'email' => 'tsukasarider@gmail.com',
            'password' => bcrypt('rideryanghanyalewat'),
            'gender' => 'Male',
            'profilePicture' => 'user4.jpg',
            'isAdmin' => '0'
        ],
        ]);

        DB::table('followed_categories')->insert([
        [
            'userID' => '1',
            'categoryID' => '1',
        ],[
            'userID' => '1',
            'categoryID' => '2',
        ]
        ,[
            'userID' => '1',
            'categoryID' => '3',
        ],[
            'userID' => '4',
            'categoryID' => '3',
        ]
        ]);

        DB::table('carts')->insert([
        [
            'userID' => '1',
            'totalPrice' => '0',
        ],[
            'userID' => '2',
            'totalPrice' => '0',
        ],[
            'userID' => '3',
            'totalPrice' => '0',
        ],[
            'userID' => '4',
            'totalPrice' => '0',
        ]
        ]);
    }
}
