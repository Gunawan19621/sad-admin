<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OurDistributor;
use App\Models\SubCategory;
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
            ->leftJoin('tb_sub_category', 'tb_product.id_sub_category', '=', 'tb_sub_category.id')
            ->select('tb_product.*', 'tb_sub_category.name_sub_category')
            ->get();

        $data = [
            'product' => $product,
            'active' => 'product',
        ];
        return view('pages.admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'distributor' => OurDistributor::all(),
            'subCategory' => SubCategory::all(),
            'product' => Product::all(),
            'active' => 'product',
        ];
        return view('pages.admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                'id_distributor' => 'required',
                'id_sub_category' => 'required',
                'name_product' => 'required',
                'sub_product' => 'required',
                'year_product' => 'required|integer',
                'alcohol' => 'required|numeric',
                'temperature' => 'required|integer',
                'cellaring' => 'required',
                'total_acidity' => 'required|numeric',
                'ressidual_sugar' => 'required|numeric',
                'bottle_produced' => 'required|integer',
                'size_bottle' => 'required',
                'award_won' => 'required',
                'characteristics' => 'required',
                'testing_note' => 'required',
                'food_pairing' => 'required',
                'description_product' => 'required',
                'image_product' => 'required|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'id_distributor.required' => 'Distributor is required',
                'id_sub_category.required' => 'Sub Category is required',
                'name_product.required' => 'Name Product is required',
                'sub_product.required' => 'Sub Product is required',
                'year_product.required' => 'Year Product is required',
                'alcohol.required' => 'Alcohol is required',
                'temperature.required' => 'Temperature is required',
                'cellaring.required' => 'Cellaring is required',
                'total_acidity.required' => 'Total Acidity is required',
                'ressidual_sugar.required' => 'Ressidual Sugar is required',
                'bottle_produced.required' => 'Bottle Produced is required',
                'size_bottle.required' => 'Size Bottle is required',
                'award_won.required' => 'Award Won is required',
                'characteristics.required' => 'Characteristics is required',
                'testing_note.required' => 'Testing Note is required',
                'food_pairing.required' => 'Food Pairing is required',
                'description_product.required' => 'Description Product is required',
                'image_product.required' => 'Image Product is required',
                'image_product.mimes' => 'Image Product must be a file of type: jpeg, png, jpg',
                'image_product.max' => 'Image Product must be a file of type: jpeg, png, jpg and max 2048kb',
            ]
        );

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $imagePath = null;
            if ($request->hasFile('image_product')) {
                $imageName = time() . '.' . $request->image_product->extension();
                $request->image_product->move(public_path('images'), $imageName);
                $imagePath = $imageName;
            }

            Product::create([
                'id_distributor' => $request->id_distributor,
                'id_sub_category' => $request->id_sub_category,
                'name_product' => $request->name_product,
                'sub_product' => $request->sub_product,
                'year_product' => $request->year_product,
                'alcohol' => $request->alcohol,
                'temperature' => $request->temperature,
                'cellaring' => $request->cellaring,
                'total_acidity' => $request->total_acidity,
                'ressidual_sugar' => $request->ressidual_sugar,
                'bottle_produced' => $request->bottle_produced,
                'size_bottle' => $request->size_bottle,
                'award_won' => $request->award_won,
                'characteristics' => $request->characteristics,
                'testing_note' => $request->testing_note,
                'food_pairing' => $request->food_pairing,
                'description_product' => $request->description_product,
                'image_product' => $imagePath,
            ]);

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
            'subCategory' => SubCategory::all(),
            'product' => Product::findOrFail($id),
            'active' => 'product',
        ];
        return view('pages.admin.products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'distributor' => OurDistributor::all(),
            'subCategory' => SubCategory::all(),
            'product' => Product::findOrFail($id),
            'active' => 'product',
        ];
        return view('pages.admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                'id_distributor' => 'required',
                'id_sub_category' => 'required',
                'name_product' => 'required',
                'sub_product' => 'required',
                'year_product' => 'required|integer',
                'alcohol' => 'required|numeric',
                'temperature' => 'required|integer',
                'cellaring' => 'required',
                'total_acidity' => 'required|numeric',
                'ressidual_sugar' => 'required|numeric',
                'bottle_produced' => 'required|integer',
                'size_bottle' => 'required',
                'award_won' => 'required',
                'characteristics' => 'required',
                'testing_note' => 'required',
                'food_pairing' => 'required',
                'description_product' => 'required',
                'image_product' => 'mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'id_distributor.required' => 'Distributor is required',
                'id_sub_category.required' => 'Sub Category is required',
                'name_product.required' => 'Name Product is required',
                'sub_product.required' => 'Sub Product is required',
                'year_product.required' => 'Year Product is required',
                'alcohol.required' => 'Alcohol is required',
                'temperature.required' => 'Temperature is required',
                'cellaring.required' => 'Cellaring is required',
                'total_acidity.required' => 'Total Acidity is required',
                'ressidual_sugar.required' => 'Ressidual Sugar is required',
                'bottle_produced.required' => 'Bottle Produced is required',
                'size_bottle.required' => 'Size Bottle is required',
                'award_won.required' => 'Award Won is required',
                'characteristics.required' => 'Characteristics is required',
                'testing_note.required' => 'Testing Note is required',
                'food_pairing.required' => 'Food Pairing is required',
                'description_product.required' => 'Description Product is required',
                'image_product.mimes' => 'Image Product must be a file of type: jpeg, png, jpg',
                'image_product.max' => 'Image Product must be a file of type: jpeg, png, jpg and max 2048kb',
            ]
        );

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $product = Product::findOrFail($id);

            if ($request->hasFile('image_product')) {
                // Hapus gambar lama jika ada
                if ($product->image_product && file_exists(public_path('images/' . $product->image_product))) {
                    unlink(public_path('images/' . $product->image_product));
                }

                // Upload gambar baru
                $imageName = time() . '.' . $request->image_product->extension();
                $request->image_product->move(public_path('images'), $imageName);
                $product->image_product = $imageName;
            }

            $product->update([
                'id_distributor' => $request->id_distributor,
                'id_sub_category' => $request->id_sub_category,
                'name_product' => $request->name_product,
                'sub_product' => $request->sub_product,
                'year_product' => $request->year_product,
                'alcohol' => $request->alcohol,
                'temperature' => $request->temperature,
                'cellaring' => $request->cellaring,
                'total_acidity' => $request->total_acidity,
                'ressidual_sugar' => $request->ressidual_sugar,
                'bottle_produced' => $request->bottle_produced,
                'size_bottle' => $request->size_bottle,
                'award_won' => $request->award_won,
                'characteristics' => $request->characteristics,
                'testing_note' => $request->testing_note,
                'food_pairing' => $request->food_pairing,
                'description_product' => $request->description_product,
                'image_product' => $product->image_product,
            ]);

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