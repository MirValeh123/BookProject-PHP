<?php

namespace App\Http\Controllers\admin\kitab;

use App\Http\Controllers\Controller;
use App\Models\Kitaplar;
use App\Models\YayinEvi;
use App\Models\Yazarlar;
use Illuminate\Http\Request;
use App\Helper\mHelper;
use App\Models\Kateqoriler;

class kitabIndexController extends Controller
{
    public function index()
    {
        $data = Kitaplar::all();
        return view('admin.kitab.index', ['data' => $data]);
    }
    public function create()
    {
        $kateqori = Kateqoriler::all();
        $yazar = Yazarlar::all();
        $yayinevi = YayinEvi::all();
        return view('admin.kitab.create', ['yazar' => $yazar, 'yayinevi' => $yayinevi, 'kateqori' => $kateqori]);
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');

        $all['selflink'] = mHelper::permalink($all['name']);
        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

        $all['image'] = $filename;
        $insert = Kitaplar::create($all);
        if ($insert) {
            return redirect()->back()->with('Kitap Eklendi!');
        } else {
            return redirect()->back()->with('Kitap Eklendi!');
        }
    }

    public function edit($id)
    {
        $data = Kitaplar::where('id', '=', $id)->get();
        if ($data) {
            return view('admin.kitab.update', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = Kitaplar::where('id', '=', $id)->get();
        if ($data) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $filename = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $filename);

            $all['image'] = $filename;
            $update = Kitaplar::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Kitap Duzenlendi');
            } else {
                return redirect()->back()->with('status', 'Kitap Duzenlenemedi');
            }
        } else {
            return redirect('/');
        }
    }
    public function delete($id)
    {
        Kitaplar::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
