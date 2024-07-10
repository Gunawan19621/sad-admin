<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Award;
use App\Models\CategoryFaq;
use App\Models\ContactUs;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\MenuHeader;
use App\Models\OurStory;
use App\Models\OurTeam;
use App\Models\OurVision;
use App\Models\Product;
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
        $about=About::find(1);
        $gallery=Gallery::all();
        $products=Product::take(8)->get();
        $contact=ContactUs::find(1);
        
        
        
        

        return view('pages.web.layouts.about.index',compact('headers','about','gallery','products','contact'));
    }


    public function about()
    {
        //
        $headers=MenuHeader::find(2);
        $about=About::find(1);
        $teams=OurTeam::take(4)->get();
        $awards=Award::take(5)->get();  
        $faqs=FAQ::take(4)->get(); 
        $contact=ContactUs::find(1);     
        return view('pages.web.layouts.about.about',compact('headers','about','teams','awards','faqs','contact'	));
    }


    public function our_story()
    {
        //
        $headers=MenuHeader::find(1);
        $story=OurStory::all();
        return view('pages.web.layouts.about.ourstory',compact('headers','story'));
    }

    public function our_team()
    {
        //
        $headers=MenuHeader::find(1);
        $teams=OurTeam::all();
        
        return view('pages.web.layouts.about.ourteam',compact('headers','teams'));
    }

    public function our_vision()
    {
        //
        $headers=MenuHeader::find(1);
        $vision=OurVision::all();
        return view('pages.web.layouts.about.ourvision',compact('headers','vision'	));
    }


    public function awards()
    {
        //
        $headers=MenuHeader::find(1);
        $awards=Award::all();
        
        return view('pages.web.layouts.about.awards',compact('headers','awards'	));	
    }

    public function faq()
    {
        //
        $headers=MenuHeader::find(1);
        $faq=CategoryFaq::with('faq')->get();
        
        
        
        return view('pages.web.layouts.about.faq',compact('headers','faq'	));
    }

    public function contact_us()
    {
        //
        $headers=MenuHeader::find(1);
        $contact=ContactUs::find(1); 
        return view('pages.web.layouts.about.contactus',compact('headers','contact'	));
    }
}