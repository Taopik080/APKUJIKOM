<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Like;

class LikeController extends Controller
{

    public function like(Photo $photo)
    {
        $user = auth()->user(); // Mengambil pengguna yang sedang login
    
        // Memeriksa apakah pengguna sudah memberikan like sebelumnya
        $existingLike = Like::where('user_id', $user->id)
                            ->where('photo_id', $photo->id)
                            ->first();
    
        // Jika belum, tambahkan like
        if (!$existingLike) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->photo_id = $photo->id;
            
            $like->save();
        }
    
        // Memuat jumlah like yang terbaru dan menyimpannya ke model Photo
        $photo->loadCount('likes');
        $photo->save();
    
        // Redirect atau kembali ke halaman sebelumnya
        return back();
    }
    
    public function unlike(Photo $photo)
    {
        $user = auth()->user();
    
        // Hapus like jika pengguna sudah memberikan like sebelumnya
        Like::where('user_id', $user->id)
            ->where('photo_id', $photo->id)
            ->delete();
    
        // Memuat jumlah like yang terbaru dan menyimpannya ke model Photo
        $photo->loadCount('likes');
        $photo->save();
    
        // Redirect atau kembali ke halaman sebelumnya
        return back();
    }
    
}
