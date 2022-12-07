<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'Ibrahim',
            'email' => 'i@alashqar.com',
            'password' => Hash::make('secret'),
            'phone_number' => '05676777892',
            'type' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'System Admin',
            'email' => 'sys@alashqar.com',
            'password' => Hash::make('secret'),
            'phone_number' => '05676777899'
        ]);
        DB::table('users')->insert([
            'name' => 'Mohammed',
            'email' => 'moh@alashqar.com',
            'password' => Hash::make('123456'),
            'phone_number' => '05676777852'
        ]);
    }
}
