<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_productscontroller extends Controller
{
    //
    public function index()
    {
        //
        return view('pages.web.layouts.products.index');
    }

    public function show()
    {
        //
        return view('pages.web.layouts.products.show');
    }
}