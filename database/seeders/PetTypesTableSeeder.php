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
            'living_space' => 'Binnen',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Kat',
            'living_space' => 'Binnen',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Vogel',
            'living_space' => 'Kooi',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Paard',
            'living_space' => 'Buiten',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Koe',
            'living_space' => 'Buiten',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pet_types')->insert([
            'name' => 'Slang',
            'living_space' => 'Kooi',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
