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
            'resort' => Resort::all(),
            'active' => 'resort',
        ];
        return view('pages.admin.experience.resort.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'resort' => Resort::all(),
            'active' => 'resort',
        ];
        return view('pages.admin.experience.resort.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'title_resort' => 'required',
            'subtitle_resort' => 'required',
            'description_resort' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title_resort.required' => 'Title Resort is required',
            'subtitle_resort.required' => 'Subtitle Resort is required',
            'description_resort.required' => 'Description Resort is required',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $validatedData['image'] = $imageName;
            }

            Resort::create($validatedData);

            return redirect()->route('dashboard.resort.index')->with('success', 'Data Resort add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Resort failed to added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'resort' => Resort::findOrFail($id),
            'active' => 'resort',
        ];
        return view('pages.admin.experience.resort.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'resort' => Resort::findOrFail($id),
            'active' => 'resort',
        ];
        return view('pages.admin.experience.resort.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'title_resort' => 'required',
            'subtitle_resort' => 'required',
            'description_resort' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title_resort.required' => 'Title Resort is required',
            'subtitle_resort.required' => 'Subtitle Resort is required',
            'description_resort.required' => 'Description Resort is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = Resort::findOrFail($id);
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

            return redirect()->route('dashboard.resort.index')->with('success', 'Data Resort updated successfully');
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
