<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use Illuminate\Http\Request;

class web_resortcontroller extends Controller
{
    //
    public function index()
    {
        //
        $resort=Resort::with('category')->get();
        return view('pages.web.layouts.resort.index',compact('resort'));
    
    }

    public function show()
    {
        //
        return view('pages.web.layouts.resort.show');
    }

}