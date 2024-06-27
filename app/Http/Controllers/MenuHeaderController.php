<?php

namespace App\Http\Controllers;

use App\Models\MenuHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'menuHeader' => MenuHeader::all(),
            'active' => 'menu-header',
        ];
        return view('pages.admin.layouts.menu-header.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'title_header' => 'nullable|string|max:255',
            'subtitle_header' => 'nullable|string|max:255',
            'image_header' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image_header.required' => 'Image header is required',
            'image_header.image' => 'Image header must be an image',
            'image_header.mimes' => 'Image header must be a file of type: jpeg, png, jpg, gif',
            'image_header.max' => 'Image header must be a file with a maximum size of 2048 kilobytes',
        ]);

        try {
            $data = MenuHeader::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_header')) {
                if ($data->image_header && file_exists(public_path('images/' . $data->image_header))) {
                    unlink(public_path('images/' . $data->image_header));
                }

                $imageName = time() . '.' . $request->image_header->extension();
                $request->image_header->move(public_path('images'), $imageName);
                $validatedData['image_header'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Header updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data header failed to update');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
