<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Kateqoriler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use \App\Models\Kitaplar;
use \App\Models\Subscribers;

class frontIndexController extends Controller
{
    public function index()
    {
        // dd(Kateqoriler::tree());
        $data = Kitaplar::paginate(6);
        // $categories = Kateqoriler::tree();
        $chunks = collect($data->items())
            ->chunk(3);
        return view('front.index', ['chunks' => $chunks, 'data' => $data]);
    }
    public function  subscribe(Request $request)
    {
        $data = $request->all();
        $all = Subscribers::all();
        foreach ($all as $key => $value) {
            // dd($value);

            if ($data['email'] != $value['email']) {
                $insert = Subscribers::create($data);
                if ($insert) {
                    return redirect()->back()->with('status', 'Subscribed!');
                } else {
                    return redirect()->back()->with('status', 'Not Subscribed!');
                }
            } else {
                http_response_code(404);
            }
        }
    }
}
