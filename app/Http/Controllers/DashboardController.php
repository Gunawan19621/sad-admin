<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Enquiry;
use App\Models\OurDistributor;
use App\Models\OurTeam;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Resort;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $data = [
    //         'active' => 'dashboard',
    //         'teams' => OurTeam::count(),
    //         'partners' => Partner::count(),
    //         'distributors' => OurDistributor::count(),
    //         'countProducts' => Product::count(),
    //         'categoryProducts' => CategoryProduct::with(['subCategories', 'subCategories.products'])->get(), // Load subcategories and products count
    //         'countEnquiries' => Enquiry::count(),
    //         'enquiries' => Enquiry::all(),
    //         'countResort' => Resort::count(),
    //     ];

    //     return view('pages.admin.index', $data);
    // }
    // public function index()
    // {
    //     $categoryProducts = CategoryProduct::with(['subCategories', 'subCategories.products'])->get();

    //     $chartData = $categoryProducts->map(function ($category) {
    //         $subCategoryProductsCount = $category->subCategories->map(function ($subCategory) {
    //             return $subCategory->products->count();
    //         })->sum();
    //         return [
    //             'label' => $category->name_category_product,
    //             'count' => $subCategoryProductsCount
    //         ];
    //     });

    //     $data = [
    //         'active' => 'dashboard',
    //         'teams' => OurTeam::count(),
    //         'partners' => Partner::count(),
    //         'distributors' => OurDistributor::count(),
    //         'countProducts' => Product::count(),
    //         'categoryProducts' => $categoryProducts,
    //         'chartData' => $chartData,
    //         'countEnquiries' => Enquiry::count(),
    //         'enquiries' => Enquiry::all(),
    //         'countResort' => Resort::count(),
    //     ];

    //     return view('pages.admin.index', $data);
    // }
    public function index()
    {
        $categoryProducts = CategoryProduct::with(['subCategories', 'subCategories.products'])->get();
        $totalProducts = Product::count();

        $chartData = $categoryProducts->map(function ($category) use ($totalProducts) {
            $categoryTotal = 0;
            foreach ($category->subCategories as $subcategory) {
                $categoryTotal += $subcategory->products->count();
            }

            return [
                'label' => $category->name_category_product,
                'count' => $categoryTotal,
                'percentage' => $totalProducts > 0 ? ($categoryTotal / $totalProducts) * 100 : 0
            ];
        });

        $data = [
            'active' => 'dashboard',
            'teams' => OurTeam::count(),
            'partners' => Partner::count(),
            'distributors' => OurDistributor::count(),
            'countProducts' => $totalProducts,
            'categoryProducts' => $categoryProducts, // Load subcategories and products count
            'countEnquiries' => Enquiry::count(),
            'enquiries' => Enquiry::all(),
            'countResort' => Resort::count(),
            'chartData' => $chartData
        ];

        return view('pages.admin.index', $data);
    }
}
