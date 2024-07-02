<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_shopcontroller extends Controller
{
    //
    public function index()
    {
        //
        return view('pages.web.layouts.shop.index');
    }

    public function show()
    {
        //
        return view('pages.web.layouts.shop.show');
    }

}