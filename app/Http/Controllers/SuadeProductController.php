<?php

namespace App\Http\Controllers;

use App\Models\SuadeProduct;
use Illuminate\Http\Request;
use App\Models\SuadeProductType;
use App\Models\SuadeProductCategory;

class SuadeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'suadeProduct' => SuadeProduct::all(),
            'active' => 'suadeProduct',
        ];
        return view('pages.admin.suade-product.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'productCategory' => SuadeProductCategory::all(),
            'productType' => SuadeProductType::all(),
            'active' => 'suadeProduct',
        ];
        return view('pages.admin.suade-product.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_product' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'price_product' => 'required|numeric',
            'discount_product' => 'nullable|numeric',
            'status_product' => 'required',
            'subtitle_product' => 'nullable',
            'description_product' => 'nullable',
            'additional_product' => 'nullable',
            'image_product' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image_product')) {
                $imageName = time() . '.' . $request->image_product->extension();
                $request->image_product->move(public_path('images/product'), $imageName);
                $imagePath = $imageName;
            }

            SuadeProduct::create([
                'name_product' => $request->name_product,
                'category_id' => $request->category_id,
                'type_id' => $request->type_id,
                'price_product' => $request->price_product,
                'discount_product' => $request->discount_product,
                'status_product' => $request->status_product,
                'subtitle_product' => $request->subtitle_product,
                'description_product' => $request->description_product,
                'additional_product' => $request->additional_product,
                'image_product' => $imagePath,
            ]);
            return redirect()->route('dashboard.suade-product.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.suade-product.index')->with('error', 'Data Gagal Ditambahkan', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'productCategory' => SuadeProductCategory::all(),
            'productType' => SuadeProductType::all(),
            'suadeProduct' => SuadeProduct::findOrFail($id),
            'active' => 'suadeProduct',
        ];
        return view('pages.admin.suade-product.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // dd($request->all());
        $request->validate([
            'name_product' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'price_product' => 'required|numeric',
            'discount_product' => 'nullable|numeric',
            'status_product' => 'required',
            'subtitle_product' => 'nullable',
            'description_product' => 'nullable',
            'additional_product' => 'nullable',
            'image_product' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $suadeProduct = SuadeProduct::findOrFail($id);

            if ($request->hasFile('image_product')) {
                // Hapus gambar lama jika ada
                if ($suadeProduct->image_product && file_exists(public_path('images/product' . $suadeProduct->image_product))) {
                    unlink(public_path('images/product' . $suadeProduct->image_product));
                }

                // Upload gambar baru
                $imageName = time() . '.' . $request->image_product->extension();
                $request->image_product->move(public_path('images/product'), $imageName);
                $suadeProduct->image_product = $imageName;
            }

            $suadeProduct->update([
                'name_product' => $request->name_product,
                'category_id' => $request->category_id,
                'type_id' => $request->type_id,
                'price_product' => $request->price_product,
                'discount_product' => $request->discount_product,
                'status_product' => $request->status_product,
                'subtitle_product' => $request->subtitle_product,
                'description_product' => $request->description_product,
                'additional_product' => $request->additional_product,
                'image_product' => $suadeProduct->image_product,
            ]);
            return redirect()->route('dashboard.suade-product.index')->with('success', 'Data Berhasil di Update');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.suade-product.index')->with('error', 'Data Gagal Ditambahkan', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $suadeProduct = SuadeProduct::findOrFail($id);
            if ($suadeProduct->image_product && file_exists(public_path('images/product' . $suadeProduct->image_product))) {
                unlink(public_path('images/product' . $suadeProduct->image_product));
            }
            $suadeProduct->delete();
            return redirect()->route('dashboard.suade-product.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.suade-product.index')->with('error', 'Data Gagal Dihapus', $e->getMessage());
        }
    }
}
