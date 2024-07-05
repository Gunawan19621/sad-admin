<?php

namespace App\Http\Controllers;

use App\Models\MenuHeader;
use Illuminate\Http\Request;
use App\Models\OurDistributor;

class web_distributorscontroller extends Controller
{
    //
    public function index()
    {
        //
        $headers=MenuHeader::find(5);
        $distributors=OurDistributor::paginate(4);
        return view('pages.web.layouts.distributors.index',compact('headers','distributors'));
    }

    public function show()
    {
        //
        return view('pages.web.layouts.distributors.show');
    }

}