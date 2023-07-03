<?php

namespace App\Http\Controllers\card;

use App\Http\Controllers\Controller;
use App\Models\Kitaplar;
use Illuminate\Http\Request;

class addBookCardController extends Controller
{
    public function index(){
        return view('card.index');
    }
    public function addBooktoCart($id)
    {
        $book = Kitaplar::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $book->name,
                "quantity" => 1,
                "fiyat" => $book->fiyat,
                "image" => $book->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Kitap karta eklendi!');
    }   
}
