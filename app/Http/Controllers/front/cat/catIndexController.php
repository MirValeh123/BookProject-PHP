<?php

namespace App\Http\Controllers\front\cat;

use App\Http\Controllers\Controller;
use App\Models\Kateqoriler;
use App\Models\Kitaplar;
use Illuminate\Http\Request;

class catIndexController extends Controller
{
    public function index($selflink)
    {
        $c = Kateqoriler::where('selflink', '=', $selflink)->count();
        if ($c != 0) {
            $d = Kateqoriler::where('selflink', '=', $selflink)->get();
            $k = Kitaplar::where('kateqoriId', '=', $d[0]['id'])->get();
            $num_k = $k->count();
            return view('front.cat.index', ['info' => $c, 'data' => $k, 'num' => $num_k]);
        } else {
            return redirect('/');
        }
    }
    public function show(Request $request, $selflink)
    {
        $category = Kateqoriler::where('selflink', $selflink)->firstOrFail();
        $categoryId = $request->query('kateqoriId'); // Get the category_id from the request query parameters

        // Add logic to filter data based on the category_id if it exists
        if ($categoryId) {
            // Filter data based on the category_id
            // For example:
            $filteredData = Kitaplar::where('kateqoriId', $categoryId)->get();
        } else {
            // No kateqoriId provided, fetch all data without filtering
            $filteredData = Kitaplar::all();
        }

        // Pass the filtered data and category to the view
        return view('front.cat.index', compact('filteredData', 'category'));
    }
}
