<?php

namespace App\Http\Controllers\admin\slider;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class sliderIndexController extends Controller
{
    public function index()
    {
        $data = Slider::all();
        return view('admin.slider.index', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $all = $request->except('_token');
        // $all['selflink'] = mHelper::permalink($all['name']);

        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

        $all['image'] = $filename;
        $insert = Slider::create($all);
        if ($insert) {
            return redirect()->back()->with('slider Eklendi!');
        } else {
            return redirect()->back()->with('slider Eklenemedi!');
        }
    }
    public function edit($id)
    {
        $data = Slider::where('id', '=', $id)->get();
        if ($data) {
            return view('admin.slider.update', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = Slider::where('id', '=', $id)->get();
        if ($data) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);

            $update = Slider::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Slider Duzenlendi');
            } else {
                return redirect()->back()->with('status', 'Slider Duzenlenemedi');
            }
        } else {
            return redirect('/');
        }
    }
    public function delete($id)
    {

        Slider::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
