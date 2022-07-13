<?php

namespace App\Http\Controllers;

class StaticPagesController extends Controller
{
    public function resellerPage()
    {
        return view('frontend.static_pages.reseller');
    }
}