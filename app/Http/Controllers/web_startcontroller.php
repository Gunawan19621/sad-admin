<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_startcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.web.layouts.start.index');
    }

    
}