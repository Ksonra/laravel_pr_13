<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\Favorite;

class CatalogController extends Controller
{
    public function getIndex(Request $request, Catalog $catalog){
        $products = Product::filter($request->all())->where('catalog_id',$catalog->id)->simplePaginate(12);
        $prods = Product::all();
        // $min_price = $prods->sortBy('price')->first()->price;
        // $max_price = $prods->sortByDesc('price')->first()->price;
        // $avg_price = ((float)$max_price + (float)$min_price)/2;

        return view('catalog', compact('products', 'catalog'));
    }

}
