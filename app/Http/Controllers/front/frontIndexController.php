<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use \App\Models\Kitaplar;

class frontIndexController extends Controller
{
    public function index()
    {
        $data = Kitaplar::paginate(6);

        $chunks = collect($data->items())
            ->chunk(3);
        return view('front.index',['chunks'=>$chunks,'data'=>$data]);
    }
}
