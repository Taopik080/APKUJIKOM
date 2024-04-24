<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Daerah;
use App\Models\Imgadmin;

class AppadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::query()->latest()->paginate(10);
        $daerah = Daerah::all();
        $imgadmin = Imgadmin::all();
        $comment = Comment::all();
        $commentCount = $comment->count();

        return view('app-admin.index', (compact('photos', 'daerah', 'imgadmin', 'commentCount')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daerah = Daerah::query()->latest()->paginate(5);
        return view('app-admin.daerah-create', compact('daerah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_daerah' => 'required'
        ]);

        $daerah = new Daerah;
        $daerah->nama_daerah = $request->input('nama_daerah');

        $daerah->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daerah $daerah)
    {
        $daerah->delete();
        return back();
    }
}
