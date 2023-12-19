<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Maintext;
use App\Models\Product;
use GuzzleHttp\Cookie\SetCookie;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function getIndex()
    {
        $products = Product::where('status', 'main')->get();
        return view('index', compact('products'));
    }
    public function getMaintext($url = null)
    {
        $maintext = Maintext::where('url', $url)->first();
        return view('maintext', compact('maintext'));
    }
    public function getBox()
    {
        $random = Product::orderBy(DB::raw('RAND()'))->first();
        setCookie('random_id', $random->id, time()+3600, '/');
        return redirect('add_cart/'.$random->id);
    }
}
