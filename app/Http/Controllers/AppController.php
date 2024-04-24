<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Comment;
use App\Models\Daerah;
use App\Models\Imgadmin;
use App\Models\User;
use App\Models\Like;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::where('status', 'verifed')->get();
        $comment = Comment::all();
        $user = User::all();
        $daerah = Daerah::all();
        $imgadmin = Imgadmin::all();
        $commentCount = $comment->count();

        return view('app.index', (compact('photos', 'user', 'comment', 'daerah', 'imgadmin', 'commentCount')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $daerah = Daerah::all();
        return view('app.create', (compact('user', 'daerah')));
    }

    public function photosByDaerah($daerah_id)
    {
        $daerah = Daerah::all();
        $photos = Photo::where('daerah_id', $daerah_id)->get();
        return view('app.PhotosByDaerah', compact('photos', 'daerah'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'user_id' => 'required|exists:users,id',
            'daerah_id' => 'required|numeric|exists:daerah,id',
            'nama' => 'required',
            'deskripsi' => 'required',
            'tagline' => 'required'
        ], [
            'daerah_id.required' => 'Pilih daerah terlebih dahulu.',
            'daerah_id.numeric' => 'Daerah harus berupa angka.',
            'daerah_id.exists' => 'Daerah yang dipilih tidak valid.'
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $fileName);

        $photo = new Photo;
        $photo->image = $fileName;
        $photo->user_id = $request->input('user_id');
        $photo->daerah_id = $request->input('daerah_id');
        $photo->nama = $request->input('nama');
        $photo->deskripsi = $request->input('deskripsi');
        $photo->tagline = $request->input('tagline');

        $photo->save();

        return redirect()->route('app.index');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $photos = Photo::where('id', $id)->get();
        $comment = Comment::where('photo_id', $id)->get();
        if (!$photos) {
            // Data gambar tidak ditemukan, lakukan sesuatu, seperti redirect atau tampilkan pesan error.
            abort(404); // Ini akan menampilkan halaman 404 Not Found.
        }
        return view('app.show', compact('photos', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = Photo::findOrFail($id);
        $daerah = Daerah::all();
        return view('app.edit', compact('photo', 'daerah'));
    }


    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'daerah_id' => 'required|numeric|exists:daerah,id',
            'nama' => 'required',
            'deskripsi' => 'required',
            'tagline' => 'required',
        ]);

        $photo->user_id = $request->user_id;
        $photo->daerah_id = $request->daerah_id;
        $photo->nama = $request->nama;
        $photo->deskripsi = $request->deskripsi;
        $photo->tagline = $request->tagline;

        // Simpan perubahan ke database
        $photo->save();

        // Redirect ke halaman index setelah foto berhasil diupdate
        return redirect()->route('app.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
    }
}
