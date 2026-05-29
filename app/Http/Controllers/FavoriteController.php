<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle($id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $favorite = Favorite::where('user_id', Auth::id())
            ->where('destinasi_id', $destinasi->id)
            ->first();

        if ($favorite) {

            $favorite->delete();

        } else {

            Favorite::create([
                'user_id' => Auth::id(),
                'destinasi_id' => $destinasi->id,
            ]);
        }

        return back();
    }
}