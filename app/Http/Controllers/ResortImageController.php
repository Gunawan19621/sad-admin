<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use App\Models\ResortImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResortImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resortImage = DB::table('tb_resorts_image')
            ->leftJoin('tb_resorts', 'tb_resorts_image.id_resort', '=', 'tb_resorts.id')
            ->select('tb_resorts_image.*', 'tb_resorts.title_resort')
            ->get();

        $data = [
            'resortImage' => $resortImage,
            'resort' => Resort::all(),
            'active' => 'resortImage'
        ];
        return view('pages.admin.experience.resort.resort-image.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_resort' => 'required',
            'image_resort' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_resort.required' => 'Resort is required',
            'image_resort.required' => 'Image Resort is required',
            'image_resort.image' => 'Image Resort must be an image',
            'image_resort.mimes' => 'Image Resort must be a file of type: jpeg, png, jpg, gif',
            'image_resort.max' => 'Image Resort must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_resort')) {
                $imageName = time() . '.' . $request->image_resort->extension();
                $request->image_resort->move(public_path('images'), $imageName);
                $validatedData['image_resort'] = $imageName;
            }

            ResortImage::create($validatedData);

            return redirect()->back()->with('success', 'Data Resort Image add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Resort Image failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'id_resort' => 'required',
            'image_resort' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_resort.required' => 'Resort is required',
            'image_resort.image' => 'Image Resort must be an image',
            'image_resort.mimes' => 'Image Resort must be a file of type: jpeg, png, jpg, gif',
            'image_resort.max' => 'Image Resort must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = ResortImage::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_resort')) {
                if ($data->image_resort && file_exists(public_path('images/' . $data->image_resort))) {
                    unlink(public_path('images/' . $data->image_resort));
                }

                $imageName = time() . '.' . $request->image_resort->extension();
                $request->image_resort->move(public_path('images'), $imageName);
                $validatedData['image_resort'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Resort Image updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Resort Image failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $resortImage = ResortImage::findOrFail($id);
            $resortImage->delete();
            return redirect()->back()->with('success', 'Data Resort Image Question delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Resort Image Question failed to delete');
        }
    }
}
