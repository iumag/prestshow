<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
{
    public function deletePicture($id)
    {
        $check = false;

        if (Auth::check()) {
            $picture = Picture::findOrFail($id);
            $picture->delete();
            $check = true;
        }

        return response()->json([
            'ok' => $check
        ]);
    }
}
