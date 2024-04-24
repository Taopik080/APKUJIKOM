<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Daerah;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $comment = Comment::all();
        $user = User::all();
        $daerah = Daerah::all();
        $like = Like::all();
        $keyword = $request->get('q');
        $photos = Photo::where('nama', 'like', '%' . $keyword . '%')->get();
        return view('app.search', compact('photos', 'like', 'daerah', 'user', 'comment'));
    }
}
