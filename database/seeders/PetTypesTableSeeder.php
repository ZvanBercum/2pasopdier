<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PetTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pet_types')->insert([
            'name' => 'Hond',
            'living_space' => 'binnen',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Kat',
            'living_space' => 'binnen',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Vogel',
            'living_space' => 'kooi',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Paard',
            'living_space' => 'buiten',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Koe',
            'living_space' => 'buiten',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Slang',
            'living_space' => 'kooi',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
