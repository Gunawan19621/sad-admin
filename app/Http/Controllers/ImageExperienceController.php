<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\ImageExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ImageExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imageExperience = DB::table('tb_image_experience')
            ->leftJoin('tb_experience', 'tb_image_experience.id_experience', '=', 'tb_experience.id')
            ->select('tb_image_experience.*', 'tb_experience.title_experience')
            ->get();

        $data = [
            'imageExperience' => $imageExperience,
            'experience' => Experience::all(),
            'active' => 'imageExperience'
        ];
        return view('pages.admin.experience.image-experience.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_experience' => 'required',
            'image_experience' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_experience.required' => 'Experience is required',
            'image_experience.required' => 'Image Experience is required',
            'image_experience.image' => 'Image Experience must be an image',
            'image_experience.mimes' => 'Image Experience must be a file of type: jpeg, png, jpg, gif',
            'image_experience.max' => 'Image Experience must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_experience')) {
                $imageName = time() . '.' . $request->image_experience->extension();
                $request->image_experience->move(public_path('images'), $imageName);
                $validatedData['image_experience'] = $imageName;
            }

            ImageExperience::create($validatedData);

            return redirect()->back()->with('success', 'Data Image Experience add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Image Experience failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'id_experience' => 'required',
            'image_experience' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_experience.required' => 'Experience is required',
            'image_experience.image' => 'Image Experience must be an image',
            'image_experience.mimes' => 'Image Experience must be a file of type: jpeg, png, jpg, gif',
            'image_experience.max' => 'Image Experience must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = ImageExperience::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_experience')) {
                if ($data->image_experience && file_exists(public_path('images/' . $data->image_experience))) {
                    unlink(public_path('images/' . $data->image_experience));
                }

                $imageName = time() . '.' . $request->image_experience->extension();
                $request->image_experience->move(public_path('images'), $imageName);
                $validatedData['image_experience'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Image Experience updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Image Experience failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $imageExperience = ImageExperience::findOrFail($id);
            $imageExperience->delete();
            return redirect()->back()->with('success', 'Data Image Experience Question delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Image Experience Question failed to delete');
        }
    }
}
