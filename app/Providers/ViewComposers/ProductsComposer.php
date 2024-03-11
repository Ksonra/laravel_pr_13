<?php

namespace App\Providers\ViewComposers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductsComposer
{
    public function compose(View $view)
    {
        $prods = Product::all();
        $min_price = $prods->sortBy('price')->first()->price;
        $max_price = $prods->sortByDesc('price')->first()->price;
        $avg_price = ((float)$max_price + (float)$min_price)/2;
        $view->with('min_price', $min_price)->with('max_price', $max_price)->with('avg_price', $avg_price);
    }
}
