<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            // 'menuHeader' => MenuHeader::all(),
            'gallery' => Gallery::all(),
            'active' => 'gallery',
        ];
        return view('pages.admin.gallery.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Title is required',
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

            Gallery::create($validatedData);

            return redirect()->back()->with('success', 'Data Image Gallry add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Image Gallry failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Title is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = Gallery::findOrFail($id);
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

            return redirect()->back()->with('success', 'Data Image Gallery updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Image Gallery failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            $gallery->delete();
            return redirect()->back()->with('success', 'Data Image Gallery delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Image Gallery failed to delete');
        }
    }
}
