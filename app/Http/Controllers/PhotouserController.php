<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotouserController extends Controller
{
    public function destroy(Photo $photo){
        $photo->delete();
        return back();
    }
}
