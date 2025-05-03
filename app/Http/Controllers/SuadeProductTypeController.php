<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuadeProductType;
use App\Models\SuadeProductTypeTour;
use App\Models\SuadeProductTypeGallery;
use App\Models\SuadeProductTypeCollection;

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

    // Halaman Type Gallery
    public function gallery( string $id)
    {
        $data = [
            'productType' => SuadeProductType::findOrFail($id),
            'typeGallery' => SuadeProductTypeGallery::where('product_type_id', $id)->get(),
            'active' => 'productType',
        ];
        return view('pages.admin.suade-product.product-type.type-gallery.index', $data);
    }
    // proses tambah data
    public function galleryStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_type_id' => 'required',
            'status_gallery' => 'required',
            'image_product_type' => 'required',
            'image_product_type.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $imagePaths = [];
            if ($request->hasFile('image_product_type')) {
                foreach ($request->file('image_product_type') as $file) {
                    $imageName = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/productType/gallery'), $imageName);

                    // Simpan ke DB
                    SuadeProductTypeGallery::create([
                        'product_type_id' => $request->product_type_id,
                        'status_gallery' => $request->status_gallery,
                        'image_product_type' => $imageName,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan', $e->getMessage());
        }
    }
    // proses hapus data
    public function galleryDestroy(string $id)
    {
        try {
            $typeGallery = SuadeProductTypeGallery::findOrFail($id);
            if ($typeGallery->images_hero_type && file_exists(public_path('images/productType/gallery/' . $typeGallery->images_hero_type))) {
                unlink(public_path('images/productType/gallery/' . $typeGallery->images_hero_type));
            }
            $typeGallery->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus', $e->getMessage());
        }
    }


    // Halaman Type Collection
    public function collection(string $id)
    {
        // dd('oke');
        $data = [
            'productType' => SuadeProductType::findOrFail($id),
            'typeCollection' => SuadeProductTypeCollection::where('product_type_id', $id)->get(),
            'active' => 'productType',
        ];
        return view('pages.admin.suade-product.product-type.type-collection.index', $data);
    }
    // proses tambah data
    public function collectionStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_collection' => 'required',
            'product_type_id' => 'required',
            'status_collection' => 'required',
            'images_collection' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('images_collection')) {
                $imageName = time() . '.' . $request->images_collection->extension();
                $request->images_collection->move(public_path('images/productType/collection'), $imageName);
                $imagePath = $imageName;
            }
            SuadeProductTypeCollection::create([
                'product_type_id' => $request->product_type_id,
                'name_collection' => $request->name_collection,
                'status_collection' => $request->status_collection,
                'images_collection' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan', $e->getMessage());
        }
    }
    // proses update data
    public function collectionUpdate(Request $request, string $collectionId)
    {
        // dd($request->all());
        $request->validate([
            'name_collection' => 'required',
            'product_type_id' => 'required',
            'status_collection' => 'required',
            'images_collection' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $productType = SuadeProductTypeCollection::findOrFail($collectionId);

            if ($request->hasFile('images_collection')) {
                // Hapus gambar lama jika ada
                if ($productType->images_collection && file_exists(public_path('images/productType/collection' . $productType->images_collection))) {
                    unlink(public_path('images/productType/collection' . $productType->images_collection));
                }

                // Upload gambar baru
                $imageName = time() . '.' . $request->images_collection->extension();
                $request->images_collection->move(public_path('images/productType/collection'), $imageName);
                $productType->images_collection = $imageName;
            }

            $productType->update([
                'name_collection' => $request->name_collection,
                'product_type_id' => $request->product_type_id,
                'status_collection' => $request->status_collection,
                'images_collection' => $productType->images_collection,
            ]);
            return redirect()->back()->with('success', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Diubah', $e->getMessage());
        }
    }
    // proses hapus data
    public function collectionDestroy(string $id)
    {
        try {
            $typeCollection = SuadeProductTypeCollection::findOrFail($id);
            if ($typeCollection->images_collection && file_exists(public_path('images/productType/collection/' . $typeCollection->images_collection))) {
                unlink(public_path('images/productType/collection/' . $typeCollection->images_collection));
            }
            $typeCollection->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus', $e->getMessage());
        }
    }

    // Halaman Type Tour
    public function tour( string $id)
    {
        $data = [
            'productType' => SuadeProductType::findOrFail($id),
            'typeTour' => SuadeProductTypeTour::where('product_type_id', $id)->get(),
            'active' => 'productType',
        ];
        return view('pages.admin.suade-product.product-type.type-tour.index', $data);
    }
    // halaman tambah data
    public function tourCreate( string $tourId)
    {
        $data = [
            'productType' => SuadeProductType::findOrFail($tourId),
            'active' => 'productType',
        ];
        return view('pages.admin.suade-product.product-type.type-tour.create', $data);
    }
    // proses tambah data
    public function tourStore(Request $request)
    {
        $request->validate([
            'title_tour' => 'required',
            'product_type_id' => 'required',
            'status_tour' => 'required',
            'subtitle_tour' => 'required',
            'description_tour' => 'required',
            'images_tour' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('images_tour')) {
                $imageName = time() . '.' . $request->images_tour->extension();
                $request->images_tour->move(public_path('images/productType/tour'), $imageName);
                $imagePath = $imageName;
            }

            SuadeProductTypeTour::create([
                'title_tour' => $request->title_tour,
                'product_type_id' => $request->product_type_id,
                'status_tour' => $request->status_tour,
                'subtitle_tour' => $request->subtitle_tour,
                'description_tour' => $request->description_tour,
                'images_tour' => $imagePath,
            ]);
            return redirect()->route('dashboard.product-type.tour', $request->product_type_id)->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan', $e->getMessage());
        }
    }
    // Halaman Edit
    public function tourEdit(string $tourId, $id)
    {
        // dd($tourId, $id);
        // $data = [
        //     'productType' => SuadeProductType::findOrFail($id),
        //     'typeTour' => SuadeProductTypeTour::findOrFail($tourId),
        //     'active' => 'productType',
        // ];
        return view('pages.admin.suade-product.product-type.type-tour.edit');
    }
    // proses update data




    // Halaman Type Gallery
    public function story()
    {
        $data = [
            // 'productType' => SuadeProductType::all(),
            'active' => 'productType',
        ];
        return view('pages.admin.suade-product.product-type.type-story.index', $data);
    }
}