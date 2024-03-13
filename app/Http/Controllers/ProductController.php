<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catalog;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::whereNotNull('discount')->get();
        return view('products', compact('products'));
    }
    public function getOne(Product $product)
    {
        return view('product', compact('product'));
    }
    public function getAll(Request $request)
    {
        $all=true;
        $catalogs=Catalog::all();
        $prods=Product::all();
        $min_price = $prods->sortBy('price')->first()->price;
        $max_price = $prods->sortByDesc('price')->first()->price;
        $avg_price = ((float)$max_price + (float)$min_price)/2;
        // if ($request->search){
        //     $products=Product::where('name','like','%'.$request->search.'%')->get();
        // } else{
        //     $products = Product::all();
        // }
        $products = Product::filter($request->all())->simplePaginate(12);
        return view('products', compact('products', 'all', 'min_price', 'max_price', 'avg_price', 'catalogs'));
    }
}
