<?php

namespace App\Http\Controllers;

use App\Models\OurVision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'ourVision' => OurVision::all(),
            'active' => 'our-vision',
        ];
        return view('pages.admin.about.our-vision.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'ourVision' => OurVision::all(),
            'active' => 'our-vision',
        ];
        return view('pages.admin.about.our-vision.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'title_vision' => 'required',
            'description_vision' => 'required',
            'image_vision' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title_vision.required' => 'Title Vision is required',
            'description_vision.required' => 'Description Vision is required',
            'image_vision.required' => 'Image Vision is required',
            'image_vision.image' => 'Image Vision must be an image',
            'image_vision.mimes' => 'Image Vision must be a file of type: jpeg, png, jpg, gif',
            'image_vision.max' => 'Image Vision must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_vision')) {
                $imageName = time() . '.' . $request->image_vision->extension();
                $request->image_vision->move(public_path('images'), $imageName);
                $validatedData['image_vision'] = $imageName;
            }

            OurVision::create($validatedData);

            return redirect()->route('dashboard.our-vision.index')->with('success', 'Data Vision add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Vision failed to added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'ourVision' => OurVision::findOrFail($id),
            'active' => 'our-vision',
        ];
        return view('pages.admin.about.our-vision.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'ourVision' => OurVision::findOrFail($id),
            'active' => 'our-vision',
        ];
        return view('pages.admin.about.our-vision.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'title_vision' => 'required',
            'description_vision' => 'required',
            'image_vision' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title_vision.required' => 'Title Vision is required',
            'description_vision.required' => 'Description Vision is required',
            'image_vision.image' => 'Image Vision must be an image',
            'image_vision.mimes' => 'Image Vision must be a file of type: jpeg, png, jpg, gif',
            'image_vision.max' => 'Image Vision must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = OurVision::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_vision')) {
                if ($data->image_vision && file_exists(public_path('images/' . $data->image_vision))) {
                    unlink(public_path('images/' . $data->image_vision));
                }

                $imageName = time() . '.' . $request->image_vision->extension();
                $request->image_vision->move(public_path('images'), $imageName);
                $validatedData['image_vision'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->route('dashboard.our-vision.index')->with('success', 'Data vision updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data vision failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $ourvision = OurVision::findOrFail($id);
            $ourvision->delete();
            return redirect()->back()->with('success', 'Data vision delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data vision failed to delete');
        }
    }
}
