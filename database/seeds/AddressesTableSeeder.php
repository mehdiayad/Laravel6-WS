<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'user_id' => 6,
            'full_name' => 'Super Super',
            'address' => '123 avenue victor hugo',
            'city' => 'Paris',
            'country' => 'France',
            'postal_code' => '75016',
            'cell_number' => '+33 7 70 70 70 70',
            'is_billing' => '1',
            'is_shipping' => '0',
            'is_default' => '1',
        ]);
        
        DB::table('addresses')->insert([
            'user_id' => 6,
            'full_name' => 'Super Super',
            'address' => '65 place grand Etoile',
            'city' => 'Paris',
            'country' => 'France',
            'postal_code' => '75016',
            'cell_number' => '+33 7 70 70 70 70',
            'is_billing' => '1',
            'is_shipping' => '0',
        ]);
        
        DB::table('addresses')->insert([
            'user_id' => 6,
            'full_name' => 'Super Super',
            'address' => '99 avenue champs elysees',
            'city' => 'Paris',
            'country' => 'France',
            'postal_code' => '75008',
            'cell_number' => '+33 7 88 88 88 88',
            'is_billing' => '0',
            'is_shipping' => '1',
            'is_default' => '1',
        ]);
        
        DB::table('addresses')->insert([
            'user_id' => 6,
            'full_name' => 'Super Super',
            'address' => '12 rue Pierre Charenton',
            'city' => 'Paris',
            'country' => 'France',
            'postal_code' => '75009',
            'cell_number' => '+33 7 88 88 88 88',
            'is_billing' => '0',
            'is_shipping' => '1',
        ]);
    
    }
}
