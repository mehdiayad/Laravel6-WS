<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'superviseur',
            'login' => 'super',
            'password' => Hash::make('super'),
            'email' => 'super@gmail.com',
            'role' => 'RW',
            'active' => '1',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);
        
        DB::table('users')->insert([
            'name' => 'Alfred',
            'login' => 'userA',
            'password' => Hash::make('aaaaa'),
            'email' => 'usera@gmail.com',
            'role' => 'RO',
            'active' => '1',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Bertrand',
            'login' => 'userB',
            'password' => Hash::make('bbbbb'),
            'email' => 'userb@gmail.com',
            'role' => 'RO',
            'active' => '1',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Charles',
            'login' => 'userC',
            'password' => Hash::make('ccccc'),
            'email' => 'userc@gmail.com',
            'role' => 'RO',
            'active' => '1',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
  
    }       
}
