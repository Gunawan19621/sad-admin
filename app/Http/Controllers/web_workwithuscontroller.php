<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_workwithuscontroller extends Controller
{
    //
    public function index()
    {
        //
        return view('pages.web.layouts.workwithus.index');
    }

    public function show()
    {
        //
        return view('pages.web.layouts.workwithus.show');
    }
}