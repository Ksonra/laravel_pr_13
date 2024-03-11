<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorite;
use Auth;
use Illuminate\Http\Request;


class FavoriteController extends Controller
{
    public function getAdd(Product $product){
        $favorite = Favorite::firstOrCreate([
            'product_id' => $product->id,
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->back();
      }

      public function getMy(){
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        return view('favorite', compact('favorites'));
    }

    public function getDel(Favorite $favorite){
        Favorite::where('id', $favorite->id)->where('user_id', Auth::user()->id)->delete();
        return redirect()->back();
    }
}
