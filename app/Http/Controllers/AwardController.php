<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'award' => Award::all(),
            'active' => 'award',
        ];
        return view('pages.admin.about.awards.index', $data);
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
        $validasi = Validator::make($request->all(), [
            'title_awards' => '',
            'image_awards' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image_awards.required' => 'Image Awards is required',
            'image_awards.image' => 'Image Awards must be an image',
            'image_awards.mimes' => 'Image Awards must be a file of type: jpeg, png, jpg, gif',
            'image_awards.max' => 'Image Awards must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_awards')) {
                $imageName = time() . '.' . $request->image_awards->extension();
                $request->image_awards->move(public_path('images'), $imageName);
                $validatedData['image_awards'] = $imageName;
            }

            Award::create($validatedData);

            return redirect()->back()->with('success', 'Data award add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data award failed to added');
        }
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
        $validasi = Validator::make($request->all(), [
            'title_awards' => '',
            'image_awards' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image_awards.required' => 'Image Awards is required',
            'image_awards.image' => 'Image Awards must be an image',
            'image_awards.mimes' => 'Image Awards must be a file of type: jpeg, png, jpg, gif',
            'image_awards.max' => 'Image Awards must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = Award::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_awards')) {
                if ($data->image_awards && file_exists(public_path('images/' . $data->image_awards))) {
                    unlink(public_path('images/' . $data->image_awards));
                }

                $imageName = time() . '.' . $request->image_awards->extension();
                $request->image_awards->move(public_path('images'), $imageName);
                $validatedData['image_awards'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data award updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data award failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $award = Award::findOrFail($id);
            $award->delete();
            return redirect()->back()->with('success', 'Data award delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data award failed to delete');
        }
    }
}
