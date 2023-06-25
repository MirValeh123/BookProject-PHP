<?php

namespace App\Http\Controllers\comment;

use App\Models\comment;
use App\Http\Controllers\Controller;
use App\Models\Kitaplar;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function store(Request $request, $id)
    {

        $comment = new comment();
        $comment->user_id = auth()->id();
        $comment->kitap_id = $id;
        $comment->content = $request->input('content');

        $comment->save();
        return redirect()->back();
    }

    public function show($id)
    {
        $product = Kitaplar::with('comments')->findOrFail($id);
        dd($product);
        return view('kitap.detay.comment', compact('product'));
    }
}
