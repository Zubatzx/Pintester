<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
        [
        	'title' => 'Chris Redfield',
        	'caption' => 'BSAA elite member',
        	'price' => '100000',
        	'picture' => 'post1.jpg',
        	'categoryID' => '1',
        	'userID' => '1'
        ],[
        	'title' => 'Jill Valentine',
        	'caption' => 'BSAA elite member',
        	'price' => '150000',
        	'picture' => 'post2.jpg',
        	'categoryID' => '1',
        	'userID' => '1'
        ],[
            'title' => 'Danganronpa Game 1',
            'caption' => 'The members of the first killing game',
            'price' => '150000',
            'picture' => 'post3.jpg',
            'categoryID' => '2',
            'userID' => '2'
        ],[
            'title' => 'Enoshima Junko',
            'caption' => 'The mastermind',
            'price' => '300000',
            'picture' => 'post4.jpg',
            'categoryID' => '2',
            'userID' => '1'
        ],[
            'title' => 'Kamen Rider Zi-0',
            'caption' => '20th Heisei Kamen Rider',
            'price' => '500000',
            'picture' => 'post5.jpg',
            'categoryID' => '3',
            'userID' => '3'
        ],[
            'title' => 'Kamen Rider Grease',
            'caption' => 'Rider with power of grease',
            'price' => '100000',
            'picture' => 'post6.jpg',
            'categoryID' => '3',
            'userID' => '1'
        ],[
            'title' => 'Kamen Rider Geiz',
            'caption' => 'Rider from the future',
            'price' => '400000',
            'picture' => 'post7.jpg',
            'categoryID' => '3',
            'userID' => '4'
        ],[
            'title' => 'Hirai Momo',
            'caption' => 'Best Grill No 2',
            'price' => '900000',
            'picture' => 'post8.jpg',
            'categoryID' => '4',
            'userID' => '2'
        ],[
            'title' => 'Minatozaki Sana',
            'caption' => 'Best Grill No 1',
            'price' => '999999',
            'picture' => 'post9.jpg',
            'categoryID' => '4',
            'userID' => '2'
        ],[
            'title' => 'Myoui Mina',
            'caption' => 'Best Grill No 3',
            'price' => '800000',
            'picture' => 'post10.jpg',
            'categoryID' => '4',
            'userID' => '2'
        ],[
            'title' => 'Dark Magician',
            'caption' => 'Dark Magic Attack !!!',
            'price' => '500000',
            'picture' => 'post11.jpg',
            'categoryID' => '5',
            'userID' => '4'
        ],[
            'title' => 'Blue Eyes White Dragon',
            'caption' => 'Burst Stream of Destruction !!!',
            'price' => '550000',
            'picture' => 'post12.jpg',
            'categoryID' => '5',
            'userID' => '4'
        ]
        ]);

        DB::table('detail_comments')->insert([
        [
        	'comment' => 'I love Resident Evil Franchise',
        	'userID' => '1',
        	'postID' => '1',
        ],[
        	'comment' => 'Send Bob',
        	'userID' => '1',
        	'postID' => '2',
        ],[
        	'comment' => 'Bitch Lasagna',
        	'userID' => '2',
        	'postID' => '2',
        ]
        ]);
    }
}
