<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\MenuHeader;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class web_productscontroller extends Controller
{
    //
    public function index()
    {
        //
        $headers=MenuHeader::find(4);        
        $category=CategoryProduct::with(['subcategories' => function ($query) {
            $query->take(3); // Ambil maksimal 3 posts untuk setiap user
        }])->get();

        
        return view('pages.web.layouts.products.index',compact('headers', 'category'));
    }

    public function show($id)
    {
        //
        $category = CategoryProduct::find($id);
        $subcategories = SubCategory::where('id_category_product', $id)->get();
        $subcategory = SubCategory::where('id_category_product', $id)->first();
        $products = Product::where('id_sub_category', $subcategory->id)->get();
       
        
        return view('pages.web.layouts.products.show',compact('category', 'subcategories', 'products', 'subcategory'));
    }


    public function detail($id)
    {
        //
        $product = Product::find($id);
        $subcategory = SubCategory::find($product->id_sub_category);
        $category = CategoryProduct::find($subcategory->id_category_product);
        
       
        
        return view('pages.web.layouts.products.detail',compact('product', 'subcategory','category'));
    
    
    }
}