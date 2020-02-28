<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'code' => 'CIeop3oe0',
            'name' => 'Informatique',
            'quantity' => 10,
            'active' => '1',
        ]);
        
        DB::table('categories')->insert([
            'code' => 'CMi909e3',
            'name' => 'Mode',
            'quantity' => 44,
            'active' => '1',
        ]);
        
        DB::table('categories')->insert([
            'code' => 'CF883783',
            'name' => 'Mobilier',
            'quantity' => 23,
            'active' => '1',
        ]);
        
        
        DB::table('categories')->insert([
            'code' => 'CJ44532',
            'name' => 'Auto et Moto',
            'quantity' => 23,
            'active' => '1',
        ]);
        
        DB::table('categories')->insert([
            'code' => 'CV309403',
            'name' => 'Cuisine',
            'quantity' => 44,
            'active' => '1',
        ]);
    
    }
}
