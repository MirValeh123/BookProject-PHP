<?php

namespace App\Http\Controllers\admin\kateqori;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Kateqoriler;
use App\Models\YayinEvi;
use App\Models\Yazarlar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class kateqoriIndexController extends Controller
{
    
    public function index() {
        $say=Kateqoriler::all()->count();
        $data=Kateqoriler::all();
        $x= DataTables::of(Kateqoriler::query())->make(true);

        return view('admin.kateqori.index',['data'=>$data,'say'=>$say,'table'=>$x]);
    }
    
    public function create() {
        $yazar=Yazarlar::all();
        $yayinevi=YayinEvi::all();
        return view('admin.kateqori.create',['yazar'=>$yazar,'yayinevi'=>$yayinevi]);

    }
    public function store(Request $request) {
        $all = $request->except('_token');

        $all['selflink'] = mHelper::permalink($all['name']);
        
        $insert = Kateqoriler::create($all);
        if ($insert) {
            return redirect()->back()->with('Kateqori Eklendi!');
        } else {
            return redirect()->back()->with('Kateqori Eklendi!');
        }

    }

    public function edit($id)
    {
        $data = Kateqoriler::where('id', '=', $id)->get();
        if ($data) {
            return view('admin.kateqori.update', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = Kateqoriler::where('id', '=', $id)->get();
        if ($data) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);

            $update = Kateqoriler::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Kateqori Duzenlendi');
            } else {
                return redirect()->back()->with('status', 'Kateqori Duzenlenemedi');
            }
        } else {
            return redirect('/');
        }
    }
    public function delete($id)  {
        Kateqoriler::where('id','=',$id)->delete();
        return redirect()->back();
        
    }
}
