<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('photos')->insert([
            'image' => 'public/image/1.jpg',
            'user_id'=>'2',
            'daerah_id'=>'1',
            'nama'=>'User',
            'deskripsi'=>' Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quia dignissimos culpa id maiores architecto repellendus similique praesentium laboriosam dolor sunt mollitia sint esse rerum in doloribus voluptatem deleniti facere.',
            'status'=>'verifed',
            'tagline'=>'Rumah' 
        ]);
        DB::table('photos')->insert([
            'image' => 'image/2.jpg',
            'user_id'=>'2',
            'daerah_id'=>'2',
            'nama'=>'User',
            'deskripsi'=>' Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quia dignissimos culpa id maiores architecto repellendus similique praesentium laboriosam dolor sunt mollitia sint esse rerum in doloribus voluptatem deleniti facere.',
            'status'=>'verifed',
            'tagline'=>'Rumah' 
        ]);
        DB::table('photos')->insert([
            'image' => 'image/3.jpg',
            'user_id'=>'3',
            'daerah_id'=>'1',
            'nama'=>'User',
            'deskripsi'=>' Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quia dignissimos culpa id maiores architecto repellendus similique praesentium laboriosam dolor sunt mollitia sint esse rerum in doloribus voluptatem deleniti facere.',
            'status'=>'verifed',
            'tagline'=>'Rumah' 
        ]);DB::table('photos')->insert([
            'image' => 'image/4.png',
            'user_id'=>'3',
            'daerah_id'=>'2',
            'nama'=>'User',
            'deskripsi'=>' Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quia dignissimos culpa id maiores architecto repellendus similique praesentium laboriosam dolor sunt mollitia sint esse rerum in doloribus voluptatem deleniti facere.',
            'status'=>'verifed',
            'tagline'=>'Rumah' 
        ]);DB::table('photos')->insert([
            'image' => 'image/5.jpg',
            'user_id'=>'3',
            'daerah_id'=>'3',
            'nama'=>'User',
            'deskripsi'=>' Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quia dignissimos culpa id maiores architecto repellendus similique praesentium laboriosam dolor sunt mollitia sint esse rerum in doloribus voluptatem deleniti facere.',
            'status'=>'verifed',
            'tagline'=>'Rumah' 
        ]);DB::table('photos')->insert([
            'image' => 'image/6.png',
            'user_id'=>'3',
            'daerah_id'=>'3',
            'nama'=>'User',
            'deskripsi'=>' Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quia dignissimos culpa id maiores architecto repellendus similique praesentium laboriosam dolor sunt mollitia sint esse rerum in doloribus voluptatem deleniti facere.',
            'status'=>'verifed',
            'tagline'=>'Rumah' 
        ]);
    }
}
