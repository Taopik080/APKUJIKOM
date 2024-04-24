<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Admin',
            'role'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('admin123'),
        ]);
        DB::table('users')->insert([
            'name'=>'User',
            'role'=>'user',
            'email'=>'user@gmail.com',
            'password'=> Hash::make('user123'),
        ]);
        DB::table('users')->insert([
            'name'=>'Abdul',
            'role'=>'user',
            'email'=>'abdul@gmail.com',
            'password'=> Hash::make('abdul123'),
        ]);
        DB::table('users')->insert([
            'name'=>'Ahmad',
            'role'=>'user',
            'email'=>'ahmad@gmail.com',
            'password'=> Hash::make('ahmad123'),
        ]);
    }
}
