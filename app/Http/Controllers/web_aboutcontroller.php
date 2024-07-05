<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\FAQ;
use App\Models\MenuHeader;
use App\Models\OurTeam;
use Illuminate\Http\Request;

class web_aboutcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $headers=MenuHeader::find(1);
        return view('pages.web.layouts.about.index',compact('headers'));
    }


    public function about()
    {
        //
        $headers=MenuHeader::find(2);
        $teams=OurTeam::take(4)->get();
        $awards=Award::take(5)->get();  
        $faqs=FAQ::take(4)->get();      
        return view('pages.web.layouts.about.about',compact('headers','teams','awards','faqs'));
    }


    public function our_story()
    {
        //
        $headers=MenuHeader::find(1);
        return view('pages.web.layouts.about.ourstory',compact('headers'));
    }

    public function our_team()
    {
        //
        $headers=MenuHeader::find(1);
        return view('pages.web.layouts.about.ourteam',compact('headers'));
    }

    public function our_vision()
    {
        //
        $headers=MenuHeader::find(1);
        return view('pages.web.layouts.about.ourvision',compact('headers'));
    }


    public function awards()
    {
        //
        $headers=MenuHeader::find(1);
        return view('pages.web.layouts.about.awards',compact('headers'));
    }

    public function faq()
    {
        //
        $headers=MenuHeader::find(1);
        return view('pages.web.layouts.about.faq',compact('headers'));
    }

    public function contact_us()
    {
        //
        $headers=MenuHeader::find(1);
        return view('pages.web.layouts.about.contactus',compact('headers'));
    }
}