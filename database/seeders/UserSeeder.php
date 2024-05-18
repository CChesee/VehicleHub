<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'phone' => '081234567890',
            'location' => 'DKI Jakarta',
            'recovery_question' => 'zzz',
            'recovery_answer' => 'apaaja'
        ]);

        DB::table('users')->insert([
            'name' => 'Jojo',
            'email' => 'jojo@gmail.com',
            'password' => Hash::make('test1234'),
            'phone' => '081234123412',
            'location' => 'Banten',
            'recovery_question' => 'zzz',
            'recovery_answer' => 'apaaja'
        ]);

    }
}
