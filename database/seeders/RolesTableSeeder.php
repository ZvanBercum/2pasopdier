<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'upload_pets' => true,
            'accept_pets' => true,
            'block_users' => true,
            'remove_requests' => true,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Oppasser',
            'upload_pets' => false,
            'accept_pets' => true,
            'block_users' => false,
            'remove_requests' => false,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Eigenaar',
            'upload_pets' => true,
            'accept_pets' => false,
            'block_users' => false,
            'remove_requests' => false,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Eigenaar + Oppasser',
            'upload_pets' => true,
            'accept_pets' => true,
            'block_users' => false,
            'remove_requests' => false,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
