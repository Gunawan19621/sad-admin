<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_experiencecontroller extends Controller
{
    //
    public function index()
    {
        //
        return view('pages.web.layouts.experience.index');
    }

    public function show()
    {
        //
        return view('pages.web.layouts.experience.show');
    }


}