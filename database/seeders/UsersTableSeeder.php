<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
            'name' => 'Zissely van Bercum',
            'gender' => 'female',
            'email' => 'zisvanbercum@hotmail.com',
            'password' => bcrypt('wachtwoord'),
            'location' => 'Alphen aan den Rijn',
            'pref_picture'=> '/img/users/zissely.jpg',
            'profile' => 'Hallo, ik ben zissely van Bercum!<br/> Ik hou heel erg veel van paarden.',
            'rating' => 4,
            'role'=> 1,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        DB::table('users')->insert([
            'name' => 'Jeroen Rijsdijk',
            'gender' => 'male',
            'email' => 'rijsdijk.j@hsleiden.nl',
            'password' => bcrypt('wachtwoord'),
            'location' => 'Ter Aar',
            'pref_picture'=> '/img/users/jeroen.jpg',
            'rating' => 5,
            'role' => 4,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
