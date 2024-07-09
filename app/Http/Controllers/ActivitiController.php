<?php

namespace App\Http\Controllers;

use App\Models\Activiti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivitiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'activiti' => Activiti::all(),
            'active' => 'activiti'
        ];
        return view('pages.admin.experience.activiti.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'activiti' => Activiti::all(),
            'active' => 'activiti'
        ];
        return view('pages.admin.experience.activiti.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'title_activiti' => 'required',
            'subtitle_activiti' => 'required',
            'description_activiti' => 'required',
            'image_activiti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title_activiti.required' => 'Title Activiti is required',
            'subtitle_activiti.required' => 'Subtitle Activiti is required',
            'description_activiti.required' => 'Description Activiti is required',
            'image_activiti.required' => 'Image Activiti is required',
            'image_activiti.image' => 'Image Activiti must be an image',
            'image_activiti.mimes' => 'Image Activiti must be a file of type: jpeg, png, jpg, gif',
            'image_activiti.max' => 'Image Activiti must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_activiti')) {
                $imageName = time() . '.' . $request->image_activiti->extension();
                $request->image_activiti->move(public_path('images'), $imageName);
                $validatedData['image_activiti'] = $imageName;
            }

            Activiti::create($validatedData);

            return redirect()->route('dashboard.activiti.index')->with('success', 'Data Activiti add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Activiti failed to added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'activiti' => Activiti::findOrFail($id),
            'active' => 'activiti',
        ];
        return view('pages.admin.experience.activiti.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'activiti' => Activiti::findOrFail($id),
            'active' => 'activiti',
        ];
        return view('pages.admin.experience.activiti.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'title_activiti' => 'required',
            'subtitle_activiti' => 'required',
            'description_activiti' => 'required',
            'image_activiti' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title_activiti.required' => 'Title Activiti is required',
            'subtitle_activiti.required' => 'Subtitle Activiti is required',
            'description_activiti.required' => 'Description Activiti is required',
            'image_activiti.image' => 'Image Activiti must be an image',
            'image_activiti.mimes' => 'Image Activiti must be a file of type: jpeg, png, jpg, gif',
            'image_activiti.max' => 'Image Activiti must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = Activiti::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_activiti')) {
                if ($data->image_activiti && file_exists(public_path('images/' . $data->image_activiti))) {
                    unlink(public_path('images/' . $data->image_activiti));
                }

                $imageName = time() . '.' . $request->image_activiti->extension();
                $request->image_activiti->move(public_path('images'), $imageName);
                $validatedData['image_activiti'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->route('dashboard.activiti.index')->with('success', 'Data Activiti updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Activiti failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $activity = Activiti::findOrFail($id);
            $activity->delete();
            return redirect()->back()->with('success', 'Data Activity delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Activity failed to delete');
        }
    }
}
