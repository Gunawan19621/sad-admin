<?php

namespace App\Http\Controllers;

use App\Models\Activiti;
use App\Models\MenuHeader;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class Web_activitiescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $headers=MenuHeader::find(7);
        $activities=Activiti::paginate(6);
        return view('pages.web.layouts.activities.index',compact('headers','activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}