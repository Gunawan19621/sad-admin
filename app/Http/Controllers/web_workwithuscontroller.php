<?php

namespace App\Http\Controllers;

use App\Models\MenuHeader;
use Illuminate\Http\Request;

class web_workwithuscontroller extends Controller
{
    //
    public function index()
    {
        //
        $headers=MenuHeader::find(8); 
        return view('pages.web.layouts.workwithus.index',compact('headers'));

    }

    public function show()
    {
        //
        return view('pages.web.layouts.workwithus.show');
    }
}