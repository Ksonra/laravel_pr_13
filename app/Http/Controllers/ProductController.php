<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        // if ($request->search){
        //     $products=Product::where('name','like','%'.$request->search.'%')->get();
        // } else{
        //     $products = Product::all();
        // }
        $products = Product::filter($request->all())->simplePaginate(12);
        return view('products', compact('products', 'all'));
    }
}
