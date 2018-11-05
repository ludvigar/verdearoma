<?php

use Illuminate\Database\Seeder;
use App\Category;

class AdminCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Category::create([
        	'title' => 'Incienso',
        	'description' => 'Inciensos en general.',
        	'slug' => 'incienso',
        ]);
        Category::create([
        	'title' => 'Esencia',
        	'description' => 'Esencias y Aceites esenciales en general.',
        	'slug' => 'esencia',
        ]);
        Category::create([
        	'title' => 'Vela',
        	'description' => 'Velas en general. en general.',
        	'slug' => 'vela',
        ]);
        Category::create([
        	'title' => 'Porta incienso',
        	'description' => 'Porta inciensos en general.',
        	'slug' => 'porta-incienso',
        ]);
        Category::create([
        	'title' => 'Hornillo',
        	'description' => 'Hornillos en general.',
        	'slug' => 'hornillo',
        ]);
        Category::create([
        	'title' => 'Difusor de fragancias',
        	'description' => 'Difusores en general.',
        	'slug' => 'difusor-de-fragancias',
        ]);
    }
}
