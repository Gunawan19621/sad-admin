<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_newseventcontroller extends Controller
{
    //
    public function index()
    {
        //
        return view('pages.web.layouts.newsevent.index');
    }

    public function show()
    {
        //
        return view('pages.web.layouts.newsevent.show');
    }
}