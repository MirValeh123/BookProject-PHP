<?php

namespace App\Http\Controllers\api;

use App\Helper\mHelper;
use App\Models\Kateqoriler;
use App\Models\Kitaplar;
use App\Models\YayinEvi;
use App\Models\Yazarlar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productApiController extends Controller
{
    public function index()
    {
        $kitaplars = Kitaplar::all();
        return response()->json($kitaplars);
    }
    public function create()
    {
        $kateqori = Kateqoriler::all();
        $yazar = Yazarlar::all();
        $yayinevi = YayinEvi::all();
        return view('front.kitap.api.indexApi', ['yazar' => $yazar, 'yayinevi' => $yayinevi, 'kateqori' => $kateqori]);
    }

    public function store(Request $request)
    {
        $kitaplar = new Kitaplar;
        $kitaplar->name = $request->input('name');
        $kitaplar->selflink = mHelper::permalink($kitaplar['name']);
        $kitaplar->yazarId = $request->input('yazarId');
        $kitaplar->yayineviId = $request->input('yayineviId');
        $kitaplar->kateqoriId = $request->input('kateqoriId');


        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);
        $kitaplar->image = $filename;


        $kitaplar->fiyat = $request->input('fiyat');
        $kitaplar->aciklama = $request->input('aciklama');
        $kitaplar->save();

        return response()->json($kitaplar, 200);
        
    }

    public function show($id)
    {
        $kitaplar = Kitaplar::findOrFail($id);
        $yazar = Yazarlar::findOrFail($kitaplar->yazarId);
        $kitaplar->yazarId = $yazar->name;
        return response()->json($kitaplar);
    }
    public function edit($id)
    {
        $kateqori = Kateqoriler::all();
        $yazar = Yazarlar::all();
        $yayinevi = YayinEvi::all();
        $data = Kitaplar::where('id', '=', $id)->get();
        if ($data) {
            return view('front.kitap.api.updateApi', ['data' => $data,'yazar'=>$yazar,'yayinevi'=>$yayinevi,'kateqori'=>$kateqori]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        $kitaplar = Kitaplar::find($id);

        if (!$kitaplar) {
            return response()->json(['message' => 'Kitaplar not found'], 404);
        }

        $kitaplar->name = $request->input('name');
        $kitaplar->selflink =  mHelper::permalink($kitaplar['name']);
        $kitaplar->yazarId = $request->input('yazarId');
        $kitaplar->yayineviId = $request->input('yayineviId');
        $kitaplar->kateqoriId = $request->input('kateqoriId');


        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);
        $kitaplar->image = $filename;


        $kitaplar->fiyat = $request->input('fiyat');
        $kitaplar->aciklama = $request->input('aciklama');
        $kitaplar->save();

        return response()->json($kitaplar);
    }

    public function destroy($id)
    {
        $kitaplar = Kitaplar::findOrFail($id);
        $kitaplar->delete();
        return response()->json(['message' => 'Kitap  deleted'], 204);
    }
}
