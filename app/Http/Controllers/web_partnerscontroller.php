<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\MenuHeader;
use Illuminate\Http\Request;

class web_partnerscontroller extends Controller
{
    //
    public function index()
    {
        //
        $headers=MenuHeader::find(6); 
        $partners=Partner::all();
        return view('pages.web.layouts.partners.index',compact('headers','partners'));
    
    }

    public function show()
    {
        //
        return view('pages.web.layouts.partners.show');
    }
}