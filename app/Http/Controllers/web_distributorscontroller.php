<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_distributorscontroller extends Controller
{
    //
    public function index()
    {
        //
        return view('pages.web.layouts.distributors.index');
    }

    public function show()
    {
        //
        return view('pages.web.layouts.distributors.show');
    }

}