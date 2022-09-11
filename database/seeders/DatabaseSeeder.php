<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Muhamad Aliamsyah',
            'email' => 'alam@gmail.com',
            'password' => Hash::make('password'),
            'isadmin'   => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Edi Indonesia',
            'email' => 'edi@gmail.com',
            'password' => Hash::make('password'),
            'isadmin'   => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
