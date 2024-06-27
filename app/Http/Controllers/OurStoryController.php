<?php

namespace App\Http\Controllers;

use App\Models\OurStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'ourStory' => OurStory::all(),
            'active' => 'our-story',
        ];
        return view('pages.admin.layouts.our-story.index', $data);
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
            'title_story' => 'required',
            'description_story' => 'required',
            'year_story' => 'required',
            'image_story' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title_story.required' => 'Title Story is required',
            'description_story.required' => 'Description Story is required',
            'year_story.required' => 'Year Story is required',
            'image_story.required' => 'Image Story is required',
            'image_story.image' => 'Image Story must be an image',
            'image_story.mimes' => 'Image Story must be a file of type: jpeg, png, jpg, gif',
            'image_story.max' => 'Image Story must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_story')) {
                $imageName = time() . '.' . $request->image_story->extension();
                $request->image_story->move(public_path('images'), $imageName);
                $validatedData['image_story'] = $imageName;
            }

            OurStory::create($validatedData);

            return redirect()->back()->with('success', 'Data story add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data story failed to added');
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
            'title_story' => 'required',
            'description_story' => 'required',
            'year_story' => 'required',
            'image_story' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title_story.required' => 'Title Story is required',
            'description_story.required' => 'Description Story is required',
            'year_story.required' => 'Year Story is required',
            'image_story.required' => 'Image Story is required',
            'image_story.image' => 'Image Story must be an image',
            'image_story.mimes' => 'Image Story must be a file of type: jpeg, png, jpg, gif',
            'image_story.max' => 'Image Story must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        try {
            $data = OurStory::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_story')) {
                if ($data->image_story && file_exists(public_path('images/' . $data->image_story))) {
                    unlink(public_path('images/' . $data->image_story));
                }

                $imageName = time() . '.' . $request->image_story->extension();
                $request->image_story->move(public_path('images'), $imageName);
                $validatedData['image_story'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Story updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Story failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $ourStory = OurStory::findOrFail($id);
            $ourStory->delete();
            return redirect()->back()->with('success', 'Data story delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data story failed to delete');
        }
    }
}