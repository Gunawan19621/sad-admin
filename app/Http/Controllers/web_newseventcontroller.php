<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use App\Models\MenuHeader;
use Illuminate\Http\Request;

class web_newseventcontroller extends Controller
{
    //
    public function index()
    {
        //
        $headers=MenuHeader::find(7);
        $news=NewsEvent::paginate(6);
        return view('pages.web.layouts.newsevent.index',compact('headers','news'));
    
    }

    public function show()
    {
        //
        
        return view('pages.web.layouts.newsevent.show');
    }
}