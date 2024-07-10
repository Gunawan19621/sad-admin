<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use App\Models\MenuHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'ourTeam' => OurTeam::all(),
            'active' => 'our-team',
        ];
        return view('pages.admin.about.our-team.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name_team' => 'required',
            'job_team' => 'required',
            'image_team' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name_team.required' => 'Name Team is required',
            'job_team.required' => 'Job Team is required',
            'image_team.required' => 'Image Team is required',
            'image_team.image' => 'Image Team must be an image',
            'image_team.mimes' => 'Image Team must be a file of type: jpeg, png, jpg, gif',
            'image_team.max' => 'Image Team must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_team')) {
                $imageName = time() . '.' . $request->image_team->extension();
                $request->image_team->move(public_path('images'), $imageName);
                $validatedData['image_team'] = $imageName;
            }

            OurTeam::create($validatedData);

            return redirect()->back()->with('success', 'Data Team add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Team failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name_team' => 'required',
            'job_team' => 'required',
            'image_team' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name_team.required' => 'Name Team is required',
            'job_team.required' => 'Job Team is required',
            'image_team.image' => 'Image Team must be an image',
            'image_team.mimes' => 'Image Team must be a file of type: jpeg, png, jpg, gif',
            'image_team.max' => 'Image Team must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = OurTeam::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_team')) {
                if ($data->image_team && file_exists(public_path('images/' . $data->image_team))) {
                    unlink(public_path('images/' . $data->image_team));
                }

                $imageName = time() . '.' . $request->image_team->extension();
                $request->image_team->move(public_path('images'), $imageName);
                $validatedData['image_team'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Team updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Team failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $ourTeam = OurTeam::findOrFail($id);
            $ourTeam->delete();
            return redirect()->back()->with('success', 'Data Team delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Team failed to delete');
        }
    }
}
