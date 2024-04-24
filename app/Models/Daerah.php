<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;
    protected $table = 'daerah';
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}