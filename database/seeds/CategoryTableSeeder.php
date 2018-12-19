<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        [
        	'name' => 'Resident Evil',
        ],[
        	'name' => 'Danganronpa',
        ],[
        	'name' => 'Kamen Rider',
        ],[
            'name' => 'Twice',
        ],[
            'name' => 'Yu-Gi-Oh',
        ]
        ]);
    }
}
