<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getIndex(){
        return view('products');
    }
    public function getOne(Product $product){
        return view('product', compact('product'));
    }
}
