<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUser::class);
        $this->call(AdminRole::class);
        $this->call(AdminProfile::class);
        $this->call(AdminCategory::class);
    }
}
