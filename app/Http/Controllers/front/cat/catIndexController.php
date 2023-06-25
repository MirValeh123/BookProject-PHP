<?php

namespace App\Http\Controllers\front\cat;

use App\Http\Controllers\Controller;
use App\Models\Kateqoriler;
use App\Models\Kitaplar;
use Illuminate\Http\Request;

class catIndexController extends Controller
{
    public function index($selflink) {
        $c=Kateqoriler::where('selflink','=',$selflink)->count();
        if ($c!=0) {
            $d=Kateqoriler::where('selflink','=',$selflink)->get();
            $k=Kitaplar::where('kateqoriId','=',$d[0]['id'])->get();
            $num_k=$k->count();
            return view('front.cat.index',['info'=>$c,'data'=>$k,'num'=>$num_k]);


        } else {
            return redirect('/');
        }
        
    }
}
