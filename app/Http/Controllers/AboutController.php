<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'about' => About::all(),
            'active' => 'about'
        ];
        return view('pages.admin.about.about.index', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'about' => About::findOrFail($id),
            'active' => 'about',
        ];
        return view('pages.admin.about.about.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'about' => About::findOrFail($id),
            'active' => 'about',
        ];
        return view('pages.admin.about.about.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'title.required' => 'Title is required',
            'subtitle.required' => 'Subtitle is required',
            'description.required' => 'Description is required',
            'image.image' => 'Image Story must be an image',
            'image.mimes' => 'Image Story must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image Story must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = About::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image')) {
                if ($data->image && file_exists(public_path('images/' . $data->image))) {
                    unlink(public_path('images/' . $data->image));
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $validatedData['image'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->route('dashboard.about.index')->with('success', 'Data About updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data About failed to update');
        }
    }
}
