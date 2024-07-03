<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurDistributor;
use Illuminate\Support\Facades\Validator;

class OurDistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'ourDistributor' => OurDistributor::all(),
            'active' => 'our-Distributor',
        ];
        return view('pages.admin.distributors.index', $data);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name_distributor' => 'required',
            'image_distributor' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address_distributor' => 'required',
            'name_person_distributor' => 'required',
            'phone_distributor' => 'required',
        ], [
            'name_distributor.required' => 'Name Distributor is required',
            'image_distributor.image' => 'Image Distributor must be an image',
            'image_distributor.mimes' => 'Image Distributor must be a file of type: jpeg, png, jpg, gif',
            'image_distributor.max' => 'Image Distributor must be a file of type: jpeg, png, jpg, gif and max 2048kb',
            'address_distributor.required' => 'Address Distributor is required',
            'name_person_distributor.required' => 'Name Person Distributor is required',
            'phone_distributor.required' => 'Phone Distributor is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_distributor')) {
                $imageName = time() . '.' . $request->image_distributor->extension();
                $request->image_distributor->move(public_path('images'), $imageName);
                $validatedData['image_distributor'] = $imageName;
            }

            OurDistributor::create($validatedData);

            return redirect()->back()->with('success', 'Data Distributor add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Distributor failed to added');
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name_distributor' => 'required',
            'image_distributor' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address_distributor' => 'required',
            'name_person_distributor' => 'required',
            'phone_distributor' => 'required',
        ], [
            'name_distributor.required' => 'Name Distributor is required',
            'image_distributor.image' => 'Image Distributor must be an image',
            'image_distributor.mimes' => 'Image Distributor must be a file of type: jpeg, png, jpg, gif',
            'image_distributor.max' => 'Image Distributor must be a file of type: jpeg, png, jpg, gif and max 2048kb',
            'address_distributor.required' => 'Address Distributor is required',
            'name_person_distributor.required' => 'Name Person Distributor is required',
            'phone_distributor.required' => 'Phone Distributor is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = OurDistributor::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_distributor')) {
                if ($data->image_distributor && file_exists(public_path('images/' . $data->image_distributor))) {
                    unlink(public_path('images/' . $data->image_distributor));
                }

                $imageName = time() . '.' . $request->image_distributor->extension();
                $request->image_distributor->move(public_path('images'), $imageName);
                $validatedData['image_distributor'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Distributor updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Distributor failed to update');
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(string $id)
    {
        try {
            $ourDistributor = OurDistributor::findOrFail($id);
            $ourDistributor->delete();
            return redirect()->back()->with('success', 'Data Distributor delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Distributor failed to delete');
        }
    }
}
