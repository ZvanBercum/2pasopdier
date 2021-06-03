<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

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
            'age' => Carbon::parse('1994-10-23'),
            'location' => 'Alphen aan den Rijn',
            'pref_picture'=> '/img/users/zissely.jpg',
            'profile' => 'Hallo, ik ben zissely van Bercum!<br/> Ik hou heel erg veel van paarden.',
            'rating' => 4,
            'role'=> 1,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'name' => 'Jan Janssen',
            'gender' => 'male',
            'email' => 'jantje.jan@live.nl',
            'password' => bcrypt('wachtwoord'),
            'location' => 'Rotterdam',
            'rating' => 2,
            'role' => 4,
            'age' => Carbon::parse('2000-01-01'),
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
