<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function getIndex(Catalog $catalog){
        return view('catalog', compact('catalog'));
    }
}
