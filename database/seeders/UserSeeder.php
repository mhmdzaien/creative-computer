<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
            'name' => 'Adminstrator',
            'email' => 'administrator@example.com',
            'password' => Hash::make('1q2w3e4r'),
            'role' => User::ROLE_ADMIN
        ]);
    }
}
