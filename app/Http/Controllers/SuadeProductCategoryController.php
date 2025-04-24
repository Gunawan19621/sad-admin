<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuadeProductCategory;

class SuadeProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'productCategory' => SuadeProductCategory::all(),
            'active' => 'productCategory',
        ];
        return view('pages.admin.suade-product.product-category.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_category' => 'required',
            'status_category' => 'required',
        ]);

        try {
            SuadeProductCategory::create([
                'name_category' => $request->name_category,
                'status_category' => $request->status_category,
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
        $request->validate([
            'name_category' => 'required',
            'status_category' => 'required',
        ]);

        try {
            SuadeProductCategory::where('id', $id)->update([
                'name_category' => $request->name_category,
                'status_category' => $request->status_category,
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
            SuadeProductCategory::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus', $e->getMessage());
        }
    }
}
