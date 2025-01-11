<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
           [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'email_verified_at' => now(),
           ],
           [
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('12345678'),
            'role' => 'customer',
            'email_verified_at' => now(),
           ],
           [
            'name' => 'Trainer',
            'email' => 'trainer@trainer.com',
            'password' => Hash::make('12345678'),
            'role' => 'trainer',
            'email_verified_at' => now(),
           ]
        ]);
    }
}
