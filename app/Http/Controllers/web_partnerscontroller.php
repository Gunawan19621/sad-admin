<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_partnerscontroller extends Controller
{
    //
    public function index()
    {
        //
        return view('pages.web.layouts.partners.index');
    }

    public function show()
    {
        //
        return view('pages.web.layouts.partners.show');
    }
}