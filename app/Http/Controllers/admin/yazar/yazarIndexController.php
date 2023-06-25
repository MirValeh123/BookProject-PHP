<?php

namespace App\Http\Controllers\admin\yazar;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yazarlar;
use App\Helper\imageUpload;
use Faker\Core\File;

class yazarIndexController extends Controller
{
    public function index()
    {
        $data = Yazarlar::all();
        return view('admin.yazar.index', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.yazar.create');
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $all = $request->except('_token');
        // dd($all);

        $all['selflink'] = mHelper::permalink($all['name']);
        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

        $all['image'] = $filename;
        // dd($all['image']);
        $insert = Yazarlar::create($all);
        if ($insert) {
            return redirect()->back()->with('Yazar Eklendi!');
        } else {
            return redirect()->back()->with('Yazar Eklendi!');
        }
    }
    public function edit($id)
    {
        $data = Yazarlar::where('id', '=', $id)->get();
        if ($data) {
            return view('admin.yazar.update', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = Yazarlar::where('id', '=', $id)->get();
        if ($data) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $filename = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $filename);
            $all['image'] = $filename;

            // dd($filename);
            $update = Yazarlar::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Yayin Evi Duzenlendi');
            } else {
                return redirect()->back()->with('status', 'Yayin Evi Duzenlenemedi');
            }
        } else {
            return redirect('/');
        }
    }
    public function delete($id)
    {
        // $c = Yazarlar::where('id', '=', $id)->count();

        Yazarlar::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
