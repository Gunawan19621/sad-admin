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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'title_header' => '',
            'subtitle_header' => '',
            'image_header' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image_header.image' => 'Image header must be an image',
            'image_header.mimes' => 'Image header must be a file of type: jpeg, png, jpg, gif',
            'image_header.max' => 'Image header must be a file with a maximum size of 2048 kilobytes',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

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
}
