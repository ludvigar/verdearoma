<?php

use Illuminate\Database\Seeder;
use App\Profile;
use App\User;

class AdminProfile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
        	'user_id' => '1',
        	'name' => 'Administrator',
        	'slug' => 'admin',
        	'address' => 'Local',
        ]);	
        Profile::create([
        	'user_id' => '2',
        	'name' => 'Ludvigar',
        	'slug' => 'Ludvigar',
        	'address' => 'Local',
        ]);
    }
}
