<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Maintext;
use App\Models\Product;

class BaseController extends Controller
{
public function getIndex(){
    $products = Product::where('status', 'main')->get();
    return view('index', compact('products'));
}
   public function getMaintext($url = null) {
    $maintext = Maintext::where('url', $url)->first();
    return view('maintext', compact('maintext'));
   }
}
