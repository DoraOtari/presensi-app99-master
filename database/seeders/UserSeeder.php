<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'               => 'Hera Setiawan',
            'password'           => Hash::make('admin1234'),
            'email'              => 'admin@gmail.com',
            'email_verified_at'  => now(),
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);
    }
}
