<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuadeProductType;

class SuadeProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'productType' => SuadeProductType::all(),
            'active' => 'productType',
        ];
        return view('pages.admin.suade-product.product-type.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_type' => 'required',
            'status_type' => 'required',
            'images_hero_type' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('images_hero_type')) {
                $imageName = time() . '.' . $request->images_hero_type->extension();
                $request->images_hero_type->move(public_path('images/productType'), $imageName);
                $imagePath = $imageName;
            }

            SuadeProductType::create([
                'name_type' => $request->name_type,
                'status_type' => $request->status_type,
                'images_hero_type' => $imagePath,
            ]);
            return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name_type' => 'required',
            'status_type' => 'required',
            'images_hero_type' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $productType = SuadeProductType::findOrFail($id);

            if ($request->hasFile('images_hero_type')) {
                // Hapus gambar lama jika ada
                if ($productType->images_hero_type && file_exists(public_path('images/productType' . $productType->images_hero_type))) {
                    unlink(public_path('images/productType' . $productType->images_hero_type));
                }

                // Upload gambar baru
                $imageName = time() . '.' . $request->images_hero_type->extension();
                $request->images_hero_type->move(public_path('images/productType'), $imageName);
                $productType->images_hero_type = $imageName;
            }

            $productType->update([
                'name_type' => $request->name_type,
                'status_type' => $request->status_type,
                'images_hero_type' => $productType->images_hero_type,
            ]);
            return redirect()->back()->with('success', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Diubah', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $productType = SuadeProductType::findOrFail($id);
            if ($productType->images_hero_type && file_exists(public_path('images/productType/' . $productType->images_hero_type))) {
                unlink(public_path('images/productType/' . $productType->images_hero_type));
            }
            $productType->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus', $e->getMessage());
        }
    }
}
