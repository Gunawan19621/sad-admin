<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Resort;
use App\Models\Enquiry;
use App\Models\OurTeam;
use App\Models\Partner;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\OurDistributor;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
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

        $enquiry = DB::table('tb_enquiry')
            ->leftJoin('tb_type_question', 'tb_enquiry.enquiring', '=', 'tb_type_question.id')
            ->select('tb_enquiry.*', 'tb_type_question.name')
            ->where('tb_enquiry.created_at', '>=', now()->subWeek())
            ->orderBy('tb_enquiry.id', 'desc')
            ->get();

        $data = [
            'active' => 'dashboard',
            'teams' => OurTeam::count(),
            'partners' => Partner::count(),
            'distributors' => OurDistributor::count(),
            'countProducts' => $totalProducts,
            'categoryProducts' => $categoryProducts,
            'countEnquiries' => $enquiry->count(),
            'enquiries' => $enquiry,
            'countResort' => Resort::count(),
            'chartData' => $chartData
        ];

        return view('pages.admin.index', $data);
    }
}
