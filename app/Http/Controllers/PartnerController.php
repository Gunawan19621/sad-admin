<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'partner' => Partner::all(),
            'active' => 'partner',
        ];
        return view('pages.admin.partners.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name_partner' => 'required',
            'image_partner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name_partner.required' => 'Name Partner is required',
            'image_partner.required' => 'Image Partner is required',
            'image_partner.image' => 'Image Partner must be an image',
            'image_partner.mimes' => 'Image Partner must be a file of type: jpeg, png, jpg, gif',
            'image_partner.max' => 'Image Partner must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_partner')) {
                $imageName = time() . '.' . $request->image_partner->extension();
                $request->image_partner->move(public_path('images'), $imageName);
                $validatedData['image_partner'] = $imageName;
            }

            Partner::create($validatedData);

            return redirect()->back()->with('success', 'Data Partner add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Partner failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name_partner' => 'required',
            'image_partner' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name_partner.required' => 'Name Partner is required',
            'image_partner.image' => 'Image Partner must be an image',
            'image_partner.mimes' => 'Image Partner must be a file of type: jpeg, png, jpg, gif',
            'image_partner.max' => 'Image Partner must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = Partner::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_partner')) {
                if ($data->image_partner && file_exists(public_path('images/' . $data->image_partner))) {
                    unlink(public_path('images/' . $data->image_partner));
                }

                $imageName = time() . '.' . $request->image_partner->extension();
                $request->image_partner->move(public_path('images'), $imageName);
                $validatedData['image_partner'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Partner updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Partner failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $partner = Partner::findOrFail($id);
            $partner->delete();
            return redirect()->back()->with('success', 'Data Partner delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Partner failed to delete');
        }
    }
}
