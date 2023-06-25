<?php

namespace App\Http\Controllers\front\kitap;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\Kateqoriler;
use App\Models\Kitaplar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class frontKitapIndexController extends Controller
{
    public function index($selflink)
    {

        $c = Kitaplar::where('selflink', '=', $selflink)->count();
        if ($c != 0) {
            
            $z = Kitaplar::where('selflink', '=', $selflink)->get();

            return view('front.kitap.indexKitap', ['data' => $z]);
        } else {
            return redirect('/');
        }
    }

    public function store(Request $request, $id)
    {

        $comment = new comment();
        $comment->user_id = auth()->id();
        $comment->kitap_id = $id;
        $comment->content = $request->input('content');

        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

}
