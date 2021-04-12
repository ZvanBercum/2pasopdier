<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            'name' => 'Skipper',
            'type_id' => 1,
            'owner_id' => 1,
            'active' => true,
            'price' => 25,
            'rate' => 'uur',
            'profile' => 'Allerliefste hond ooit.',
            'start_time' => date("d-m-Y"),
            'end_time' => date("d-m-Y"),
            'pref_picture'=> '/img/pets/skipper.jpg',
            'sitter_id' => null,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pets')->insert([
            'name' => 'Zilver',
            'type_id' => 4,
            'owner_id' => 1,
            'active' => false,
            'price' => 50,
            'rate' => 'uur',
            'profile' => 'Pas op, pony is eigenwijs!',
            'pref_picture'=> '/img/pets/zilver.jpg',
            'start_time' => null,
            'end_time' => null,
            'sitter_id' => null,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pets')->insert([
            'name' => 'Poes',
            'type_id' => 2,
            'owner_id' => 2,
            'active' => true,
            'price' => 2,
            'rate' => 'week',
            'profile' => 'Miauw!',
            'pref_picture'=> '/img/pets/cat.jpg',
            'start_time' => null,
            'end_time' => null,
            'sitter_id' => null,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pets')->insert([
            'name' => 'Diva',
            'type_id' => 4,
            'owner_id' => 1,
            'active' => false,
            'price' => 240,
            'rate' => 'week',
            'profile' => 'Miauw!',
            'start_time' => null,
            'end_time' => null,
            'sitter_id' => null,
            'pref_picture'=> '/img/pets/diva.jpg',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pets')->insert([
            'name' => 'Navajo',
            'type_id' => 4,
            'owner_id' => 1,
            'active' => false,
            'price' => 240,
            'rate' => 'week',
            'profile' => 'Miauw!',
            'start_time' => null,
            'end_time' => null,
            'sitter_id' => null,
            'pref_picture'=> '/img/pets/navajo.jpg',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pets')->insert([
            'name' => 'Ringslang',
            'type_id' => 6,
            'owner_id' => 2,
            'active' => true,
            'price' => 200,
            'rate' => 'dag',
            'profile' => 'Pas op ik bijt!',
            'pref_picture'=> '/img/pets/slang.jpg',
            'start_time' => null,
            'end_time' => null,
            'sitter_id' => null,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pets')->insert([
            'name' => 'Fliedderfladder',
            'type_id' => 3,
            'owner_id' => 1,
            'active' => true,
            'price' => 20,
            'rate' => 'week',
            'profile' => 'Mijn kooi moet iedere dag worden verschoond...',
            'pref_picture'=> '/img/pets/papegaai.jpg',
            'start_time' => null,
            'end_time' => null,
            'sitter_id' => null,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('pets')->insert([
            'name' => 'Kadanze',
            'type_id' => 4,
            'owner_id' => 1,
            'active' => true,
            'price' => 200,
            'rate' => 'week',
            'profile' => 'Enkel hooi en een handje brok!',
            'start_time' => null,
            'end_time' => null,
            'sitter_id' => null,
            'pref_picture'=> '/img/pets/kadanze.jpg',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
