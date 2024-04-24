<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('daerah')->insert([
            'nama_daerah'=>'Jawa Barat',
        ]);
        DB::table('daerah')->insert([
            'nama_daerah'=>'Jawa Timur',
        ]);
        DB::table('daerah')->insert([
            'nama_daerah'=>'Jawa Tengah',
        ]);
    }
}
