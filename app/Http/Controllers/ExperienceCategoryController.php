<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuadeExperienceCategory;

class ExperienceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'active' => 'experienceCategory',
            'experienceCategory' => SuadeExperienceCategory::all(),
        ];
        return view('pages.admin.suade-experience.experience-category.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_experience_category' => 'required',
            'status_experience_category' => 'required',
        ],
        [
            'name_experience_category.required' => 'Category is required',
            'status_experience_category.required' => 'Status is required',
        ]);

        try {
            SuadeExperienceCategory::create([
                'name_experience_category' => $request->name_experience_category,
                'status_experience_category' => $request->status_experience_category,
            ]);
            return redirect()->back()->with('success', 'Experience Category created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create Experience Category');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_experience_category' => 'required',
            'status_experience_category' => 'required',
        ],
        [
            'name_experience_category.required' => 'Category is required',
            'status_experience_category.required' => 'Status is required',
        ]);

        try {
            $experienceCategory = SuadeExperienceCategory::findOrFail($id);
            $experienceCategory->update([
                'name_experience_category' => $request->name_experience_category,
                'status_experience_category' => $request->status_experience_category,
            ]);
            return redirect()->back()->with('success', 'Experience Category created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create Experience Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $experienceCategory = SuadeExperienceCategory::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Experience Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Experience Category');
        }
    }
}