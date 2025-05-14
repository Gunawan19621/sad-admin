<?php

namespace App\Http\Controllers\suade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view('pages.suade.home.index');
    }

    
}