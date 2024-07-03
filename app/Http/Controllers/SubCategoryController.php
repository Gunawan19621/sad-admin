<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategory = DB::table('tb_sub_category')
            ->leftJoin('tb_category_product', 'tb_sub_category.id_category_product', '=', 'tb_category_product.id')
            ->select('tb_sub_category.*', 'tb_category_product.name_category_product')
            ->get();

        $data = [
            'subCategory' => $subCategory,
            'categoryProduct' => CategoryProduct::all(),
            'active' => 'subCategory',
        ];
        return view('pages.admin.products.sub-category-product.index', $data);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $data = [
    //         'distributor' => OurDistributor::all(),
    //         'categoryProduct' => CategoryProduct::all(),
    //         'product' => Product::all(),
    //         'active' => 'product',
    //     ];
    //     return view('pages.admin.products.create', $data);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_category_product' => 'required',
            'name_sub_category' => 'required',
            'image_sub_category' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_category_product.required' => 'Category Product is required',
            'name_sub_category.required' => 'Name Sub Category is required',
            'image_sub_category.required' => 'Image Sub Category is required',
            'image_sub_category.image' => 'Image Sub Category must be an image',
            'image_sub_category.mimes' => 'Image Sub Category must be a file of type: jpeg, png, jpg, gif',
            'image_sub_category.max' => 'Image Sub Category must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_sub_category')) {
                $imageName = time() . '.' . $request->image_sub_category->extension();
                $request->image_sub_category->move(public_path('images'), $imageName);
                $validatedData['image_sub_category'] = $imageName;
            }

            SubCategory::create($validatedData);

            return redirect()->back()->with('success', 'Data Sub Category add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Sub Category failed to added');
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     $data = [
    //         'distributor' => OurDistributor::all(),
    //         'categoryProduct' => CategoryProduct::all(),
    //         'product' => Product::findOrFail($id),
    //         'active' => 'product',
    //     ];
    //     return view('pages.admin.products.show', $data);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $data = [
    //         'distributor' => OurDistributor::all(),
    //         'categoryProduct' => CategoryProduct::all(),
    //         'product' => Product::findOrFail($id),
    //         'active' => 'product',
    //     ];
    //     return view('pages.admin.products.edit', $data);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'id_category_product' => 'required',
            'name_sub_category' => 'required',
            'image_sub_category' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_category_product.required' => 'Category Product is required',
            'name_sub_category.required' => 'Name Sub Category is required',
            'image_sub_category.required' => 'Image Sub Category is required',
            'image_sub_category.image' => 'Image Sub Category must be an image',
            'image_sub_category.mimes' => 'Image Sub Category must be a file of type: jpeg, png, jpg, gif',
            'image_sub_category.max' => 'Image Sub Category must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = SubCategory::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_sub_category')) {
                if ($data->image_sub_category && file_exists(public_path('images/' . $data->image_sub_category))) {
                    unlink(public_path('images/' . $data->image_sub_category));
                }

                $imageName = time() . '.' . $request->image_sub_category->extension();
                $request->image_sub_category->move(public_path('images'), $imageName);
                $validatedData['image_sub_category'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Sub Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Sub Category failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->delete();
            return redirect()->back()->with('success', 'Data Sub Category delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Sub Category failed to delete');
        }
    }
}