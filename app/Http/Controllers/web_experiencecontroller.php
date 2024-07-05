<?php

namespace App\Http\Controllers;

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
        $experience=DB::table('tb_experience')
            ->leftJoin('tb_image_experience', 'tb_experience.id', '=', 'tb_image_experience.id_experience')
            ->select('tb_experience.*', 'tb_image_experience.image_experience')            
            ->get();
        
        return view('pages.web.layouts.experience.index',compact('headers','experience'));
    }

    public function show()
    {
        //
        return view('pages.web.layouts.experience.show');
    }


}