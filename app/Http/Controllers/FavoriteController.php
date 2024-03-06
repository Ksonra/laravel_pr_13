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
}
