<?php

namespace App\Http\Controllers\admin\yayinevi;

use App\Helper\mHelper;
use App\Models\YayinEvi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminIndexController extends Controller
{
    public function index()
    {
        $data = YayinEvi::all();
        return view('admin.yayinevi.index', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.yayinevi.create');
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = YayinEvi::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'Yayin Evi Başarıyla Eklendi');
        } else {
            return redirect()->back()->with('status', 'Yayin Evi Eklenemedi');
        }
    }
    public function edit($id)
    {
        $data = YayinEvi::where('id', '=', $id)->get();

        if ($data) {
            return view('admin.yayinevi.update', ['data' => $data]);

        } else {
            return redirect('/');
        }
        
    }

    public function update(Request $request)
    {
        $id=$request->route('id');
        $data = YayinEvi::where('id', '=', $id)->get();
        if ($data) {
            $all=$request->except('_token');
            $all['selflink']=mHelper::permalink($all['name']);
            $update=YayinEvi::where('id','=',$id)->update($all);
            if ($update) {
                return redirect()->back()->with('status','Yayin Evi Duzenlendi');
            } else {
                return redirect()->back()->with('status','Yayin Evi Duzenlenemedi');
                
            }
            

        } else {
            return redirect('/');
        }
        


    }
    public function delete($id)

    {
        $data = YayinEvi::where('id', '=', $id)->get();
        if ($data) {
            $delete=YayinEvi::where('id','=',$id)->delete();
        return redirect()->back()->with('status','Yayin Evi Basriyla Silindi');
        } else {
            return redirect('/');
        }
        
        
    }
}
