<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home ()
    {
        return view('front.home.home');
    }

    public function categoryProducts ()
    {
        return view('front.category.index');
    }

    public function details ()
    {
        return view('front.category.details');
    }
}
