<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OurDistributor;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = DB::table('tb_product')
            ->leftJoin('tb_category_product', 'tb_product.id_category_product', '=', 'tb_category_product.id')
            ->select('tb_product.*', 'tb_category_product.name_category_product')
            ->get();

        $data = [
            'product' => $product,
            'active' => 'product',
        ];
        return view('pages.admin.layouts.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'distributor' => OurDistributor::all(),
            'categoryProduct' => CategoryProduct::all(),
            'product' => Product::all(),
            'active' => 'product',
        ];
        return view('pages.admin.layouts.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_distributor' => 'required',
            'id_category_product' => 'required',
            'name_product' => 'required',
            'description_product' => 'required',
            'price_product' => 'required',
            'stock_product' => 'required',
            'image_product' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_distributor.required' => 'Distributor is required',
            'id_category_product.required' => 'Category Product is required',
            'name_product.required' => 'Name Product is required',
            'description_product.required' => 'Description Product is required',
            'price_product.required' => 'Price Product is required',
            'stock_product.required' => 'Stock Product is required',
            'image_product.required' => 'Image Product is required',
            'image_product.image' => 'Image Product must be an image',
            'image_product.mimes' => 'Image Product must be a file of type: jpeg, png, jpg, gif',
            'image_product.max' => 'Image Product must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_product')) {
                $imageName = time() . '.' . $request->image_product->extension();
                $request->image_product->move(public_path('images'), $imageName);
                $validatedData['image_product'] = $imageName;
            }

            Product::create($validatedData);

            return redirect()->route('dashboard.product.index')->with('success', 'Data Product add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Product failed to added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'distributor' => OurDistributor::all(),
            'categoryProduct' => CategoryProduct::all(),
            'product' => Product::findOrFail($id),
            'active' => 'product',
        ];
        return view('pages.admin.layouts.product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'distributor' => OurDistributor::all(),
            'categoryProduct' => CategoryProduct::all(),
            'product' => Product::findOrFail($id),
            'active' => 'product',
        ];
        return view('pages.admin.layouts.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'id_distributor' => 'required',
            'id_category_product' => 'required',
            'name_product' => 'required',
            'description_product' => 'required',
            'price_product' => 'required',
            'stock_product' => 'required',
            'image_product' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_distributor.required' => 'Distributor is required',
            'id_category_product.required' => 'Category Product is required',
            'name_product.required' => 'Name Product is required',
            'description_product.required' => 'Description Product is required',
            'price_product.required' => 'Price Product is required',
            'stock_product.required' => 'Stock Product is required',
            'image_product.required' => 'Image Product is required',
            'image_product.image' => 'Image Product must be an image',
            'image_product.mimes' => 'Image Product must be a file of type: jpeg, png, jpg, gif',
            'image_product.max' => 'Image Product must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        try {
            $data = Product::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_product')) {
                if ($data->image_product && file_exists(public_path('images/' . $data->image_product))) {
                    unlink(public_path('images/' . $data->image_product));
                }

                $imageName = time() . '.' . $request->image_product->extension();
                $request->image_product->move(public_path('images'), $imageName);
                $validatedData['image_product'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->route('dashboard.product.index')->with('success', 'Data Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Product failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->back()->with('success', 'Data Product delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Product failed to delete');
        }
    }
}
