<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuadeExperience;
use App\Models\SuadeExperienceImages;
use App\Models\SuadeExperienceCategory;

class SuadeExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'suadeExperience' => SuadeExperience::all(),
            'active' => 'suadeExperience',
        ];
        return view('pages.admin.suade-experience.experience.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'experienceCategory' => SuadeExperienceCategory::all(),
            'active' => 'suadeExperience',
        ];
        return view('pages.admin.suade-experience.experience.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_experience' => 'required',
            'category_id' => 'required',
            'status_experience' => 'required',
            'price_experience' => 'required|numeric',
            'discount_experience' => 'nullable|numeric',
            'subtitle_experience' => 'required',
            'description_experience' => 'required',
            'additional_experience' => 'required',
            'image_experience' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image_experience')) {
                $imageName = time() . '.' . $request->image_experience->extension();
                $request->image_experience->move(public_path('images/experience'), $imageName);
                $imagePath = $imageName;
            }

            SuadeExperience::create([
                'name_experience' => $request->name_experience,
                'category_id' => $request->category_id,
                'status_experience' => $request->status_experience,
                'price_experience' => $request->price_experience,
                'discount_experience' => $request->discount_experience,
                'subtitle_experience' => $request->subtitle_experience,
                'description_experience' => $request->description_experience,
                'additional_experience' => $request->additional_experience,
                'image_experience' => $imagePath,
            ]);

            return redirect()->route('dashboard.suade-experience.index')->with('success', 'Experience created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create experience: ' . $e->getMessage());
        }
    }

    // add data image experience
    public function storeImage(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'experience_id' => 'required',
            'image_experience' => 'required',
            'image_experience.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            if ($request->hasFile('image_experience')) {
                foreach ($request->file('image_experience') as $file) {
                    $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/experience/img'), $imageName);

                    // Simpan ke DB
                    SuadeExperienceImages::create([
                        'image_experience' => $imageName,
                        'experience_id' => $request->experience_id,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Image added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add image: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'ExperienceImage' => SuadeExperienceImages::where('experience_id', $id)->get(),
            'suadeExperience' => SuadeExperience::findOrFail($id),
            'active' => 'suadeExperience',
        ];
        return view('pages.admin.suade-experience.experience.image-experience.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'experienceCategory' => SuadeExperienceCategory::all(),
            'suadeExperience' => SuadeExperience::findOrFail($id),
            'active' => 'suadeExperience',
        ];
        return view('pages.admin.suade-experience.experience.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_experience' => 'required',
            'category_id' => 'required',
            'status_experience' => 'required',
            'price_experience' => 'required|numeric',
            'discount_experience' => 'nullable|numeric',
            'subtitle_experience' => 'required',
            'description_experience' => 'required',
            'additional_experience' => 'required',
            'image_experience' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $experience = SuadeExperience::findOrFail($id);

            if ($request->hasFile('image_experience')) {
                // Hapus gambar lama jika ada
                if ($experience->image_experience && file_exists(public_path('images/experience' . $experience->image_experience))) {
                    unlink(public_path('images/experience' . $experience->image_experience));
                }

                // Upload gambar baru
                $imageName = time() . '.' . $request->image_experience->extension();
                $request->image_experience->move(public_path('images/experience'), $imageName);
                $experience->image_experience = $imageName;
            }

            $experience->update([
                'name_experience' => $request->name_experience,
                'category_id' => $request->category_id,
                'status_experience' => $request->status_experience,
                'price_experience' => $request->price_experience,
                'discount_experience' => $request->discount_experience,
                'subtitle_experience' => $request->subtitle_experience,
                'description_experience' => $request->description_experience,
                'additional_experience' => $request->additional_experience,
                'image_experience' => $experience->image_experience,
            ]);

            return redirect()->route('dashboard.suade-experience.index')->with('success', 'Experience created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create experience: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $experience = SuadeExperience::findOrFail($id);

            // Hapus gambar jika ada
            if ($experience->image_experience && file_exists(public_path('images/experience/' . $experience->image_experience))) {
                unlink(public_path('images/experience/' . $experience->image_experience));
            }

            $experience->delete();

            return redirect()->route('dashboard.suade-experience.index')->with('success', 'Experience deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete experience: ' . $e->getMessage());
        }
    }

    // delete image experience
    public function destroyImage($id)
    {
        try {
            $experienceImage = SuadeExperienceImages::findOrFail($id);

            // Hapus gambar jika ada
            if ($experienceImage->image_experience && file_exists(public_path('images/experience/img/' . $experienceImage->image_experience))) {
                unlink(public_path('images/experience/img/' . $experienceImage->image_experience));
            }

            $experienceImage->delete();

            return redirect()->back()->with('success', 'Experience image deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete experience image: ' . $e->getMessage());
        }
    }
}