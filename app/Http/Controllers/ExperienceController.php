<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'experience' => Experience::all(),
            'active' => 'experience',
        ];
        return view('pages.admin.experience.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'experience' => Experience::all(),
            'active' => 'experience',
        ];
        return view('pages.admin.experience.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'title_experience' => 'required',
            'subtitle_experience' => 'required',
            'description_experience' => 'required',
        ], [
            'title_experience.required' => 'Title Experience is required',
            'subtitle_experience.required' => 'Subtitle Experience is required',
            'description_experience.required' => 'Description Experience is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            Experience::create($validatedData);

            return redirect()->route('dashboard.experience.index')->with('success', 'Data Experience add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Experience failed to added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'experience' => Experience::findOrFail($id),
            'active' => 'experience',
        ];
        return view('pages.admin.experience.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'experience' => Experience::findOrFail($id),
            'active' => 'experience',
        ];
        return view('pages.admin.experience.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'title_experience' => 'required',
            'subtitle_experience' => 'required',
            'description_experience' => 'required',
        ], [
            'title_experience.required' => 'Title Experience is required',
            'subtitle_experience.required' => 'Subtitle Experience is required',
            'description_experience.required' => 'Description Experience is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = Experience::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->route('dashboard.experience.index')->with('success', 'Data Experience updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Experience failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $experience = Experience::findOrFail($id);
            $experience->delete();
            return redirect()->back()->with('success', 'Data Experience delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Experience failed to delete');
        }
    }
}
