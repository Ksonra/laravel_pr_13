<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function getIndex(){
      $feeds = Feed::orderBy('id', 'DESC')->limit(100)->get();
      return view('feed', compact('feeds'));
    }
}
