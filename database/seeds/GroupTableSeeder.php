<?php

use Illuminate\Database\Seeder;
use \DB as DB;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++) {
        	DB::table('groups')->insert([
                'name'       => str_random(4) ,
                'created_at' => date('y-m-d-h-i-s',time())
        	]); 
        }
    }
}
