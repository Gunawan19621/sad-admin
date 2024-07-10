<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'categoryProduct' => CategoryProduct::all(),
            'active' => 'category-product'
        ];
        return view('pages.admin.products.category-product.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name_category_product' => 'required',
            'description_category_product' => 'required',
            'subtitle_category' => 'required',
        ], [
            'name_category_product.required' => 'Name Category Product is required',
            'description_category_product.required' => 'Description Category Product is required',
            'subtitle_category.required' => 'Subtitle Category is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            CategoryProduct::create($validatedData);

            return redirect()->route('dashboard.category-product.index')->with('success', 'Data Category Product add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Category Product failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name_category_product' => 'required',
            'description_category_product' => 'required',
            'subtitle_category' => 'required',
        ], [
            'name_category_product.required' => 'Name Category Product is required',
            'description_category_product.required' => 'Description Category Product is required',
            'subtitle_category.required' => 'Subtitle Category is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = CategoryProduct::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->route('dashboard.category-product.index')->with('success', 'Data Category Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Category Product failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categoryProduct = CategoryProduct::findOrFail($id);
            $categoryProduct->delete();
            return redirect()->back()->with('success', 'Data Category Product delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Category Product failed to delete');
        }
    }
}
