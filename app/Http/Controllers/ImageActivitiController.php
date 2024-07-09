<?php

namespace App\Http\Controllers;

use App\Models\Activiti;
use App\Models\ImageActiviti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ImageActivitiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imageActiviti = DB::table('tb_image_activiti')
            ->leftJoin('tb_activiti', 'tb_image_activiti.id_activiti', '=', 'tb_activiti.id')
            ->select('tb_image_activiti.*', 'tb_activiti.title_activiti')
            ->get();

        $data = [
            'imageActiviti' => $imageActiviti,
            'activiti' => Activiti::all(),
            'active' => 'imageActiviti'
        ];
        return view('pages.admin.experience.activiti.image_activiti.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_activiti' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_activiti.required' => 'Activiti is required',
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

            ImageActiviti::create($validatedData);

            return redirect()->back()->with('success', 'Data Image Activiti add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Image Activiti failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'id_activiti' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_activiti.required' => 'Activiti is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = ImageActiviti::findOrFail($id);
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

            return redirect()->back()->with('success', 'Data Image Activiti updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Image Activiti failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $imageActiviti = ImageActiviti::findOrFail($id);
            $imageActiviti->delete();
            return redirect()->back()->with('success', 'Data Image Activiti delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Image Activiti failed to delete');
        }
    }
}