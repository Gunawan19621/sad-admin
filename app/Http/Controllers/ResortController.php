<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            // 'menuHeader' => MenuHeader::all(),
            'resort' => Resort::all(),
            'active' => 'resort',
        ];
        return view('pages.admin.layouts.resort.index', $data);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'title_resort' => 'required',
            'subtitle_resort' => 'required',
            'description_resort' => 'required',
        ], [
            'title_resort.required' => 'Title Resort is required',
            'subtitle_resort.required' => 'Subtitle Resort is required',
            'description_resort.required' => 'Description Resort is required',
        ]);

        try {
            $validatedData = $validasi->validated();

            Resort::create($validatedData);

            return redirect()->back()->with('success', 'Data Resort add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Resort failed to added');
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'title_resort' => 'required',
            'subtitle_resort' => 'required',
            'description_resort' => 'required',
        ], [
            'title_resort.required' => 'Title Resort is required',
            'subtitle_resort.required' => 'Subtitle Resort is required',
            'description_resort.required' => 'Description Resort is required',
        ]);

        try {
            $data = Resort::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Resort updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Resort failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $resort = Resort::findOrFail($id);
            $resort->delete();
            return redirect()->back()->with('success', 'Data Resort delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Resort failed to delete');
        }
    }
}