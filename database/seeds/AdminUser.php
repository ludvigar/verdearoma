<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('secret'),
        	'role_id' => '1',
        ]);
        $user = User::create([
        	'email' => 'user@user.com',
        	'password' => bcrypt('secret'),
        	'role_id' => '2',
        ]);
    }
}
