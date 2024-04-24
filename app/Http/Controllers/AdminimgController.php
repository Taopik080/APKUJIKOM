<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imgadmin;

class AdminimgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $img = Imgadmin::query()->latest()->paginate(1);
        return view('app-admin.create', compact('img'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $fileName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('img'), $fileName);

        $image = new Imgadmin;
        $image->img = $fileName;

        $image->save();

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
    public function destroy(string $id)
    {
        $imgadmin = Imgadmin::find($id);
        $imgadmin->delete();
        return back();

    }
}
