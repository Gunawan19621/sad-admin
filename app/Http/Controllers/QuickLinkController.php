<?php

namespace App\Http\Controllers;

use App\Models\QuickLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuickLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'quickLink' => QuickLink::all(),
            'active' => 'quickLink',
        ];
        return view('pages.admin.layouts.quick_link.index', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'quicLink' => QuickLink::findOrFail($id),
            'active' => 'quickLink',
        ];
        return view('pages.admin.layouts.quick_link.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'quicLink' => QuickLink::findOrFail($id),
            'active' => 'quickLink',
        ];
        return view('pages.admin.layouts.quick_link.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'description' => 'required',
        ], [
            'description.required' => 'Description is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = QuickLink::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->route('dashboard.quick-link.index')->with('success', 'Data Quick Link updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Quick Link failed to update');
        }
    }
}
