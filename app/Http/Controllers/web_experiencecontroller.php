<?php

namespace App\Http\Controllers;

use App\Models\Activiti;
use App\Models\Experience;
use App\Models\MenuHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class web_experiencecontroller extends Controller
{
    //
    public function index()
    {
        //
        $headers=MenuHeader::find(3);
        $experience=Experience::all();
        $activities=Activiti::take(3)->get();
        
        
        return view('pages.web.layouts.experience.index',compact('headers','experience','activities'));
    }

    public function show(Request $request,$id)
    {
        //
        $experience=Experience::find($id);
        return view('pages.web.layouts.experience.show',compact('experience'));
    }

    public function activities()
    {
        //
        $headers=MenuHeader::find(3);
        $activities=Activiti::all();
        return view('pages.web.layouts.experience.activities',compact('headers','activities'));
    }



}