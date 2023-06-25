<?php

namespace App\Http\Controllers\front\search;

use App\Http\Controllers\Controller;
use App\Models\Kitaplar;
use Illuminate\Http\Request;

class searchIndexController extends Controller
{
    public function index(){
        if (strip_tags($_GET['q']!='')) {
            $q=strip_tags($_GET['q']);
            $data=Kitaplar::where('name','like','%'.$q.'%')->get();
            $num_k=$data->count();

            return view('front.search.index',['data'=>$data,'num'=>$num_k]);
        } else {
            return redirect('/');
        }
        
    }
}
