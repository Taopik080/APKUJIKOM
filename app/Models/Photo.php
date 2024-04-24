<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use App\Models\Like;
use App\Models\Comment;
use App\Models\Daerah;

class Photo extends Model 
{
    protected $fillable = [
        'image',
        'nama',
        'deskripsi',
        'tagline'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'daerah_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    protected $withCount = ['likes'];
}
