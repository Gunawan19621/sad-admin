<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\ExperiencePrice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExperiencePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiencePrice = DB::table('tb_experience_price')
            ->leftJoin('tb_experience', 'tb_experience_price.id_experience', '=', 'tb_experience.id')
            ->select('tb_experience_price.*', 'tb_experience.title_experience')
            ->get();

        $data = [
            'experiencePrice' => $experiencePrice,
            'experience' => Experience::all(),
            'active' => 'experiencePrice'
        ];
        return view('pages.admin.experience.experience-price.index', $data);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_experience' => 'required',
            'name_experience' => 'required',
            'price_experience' => 'required',
            'unit_experience' => 'required',
        ], [
            'id_experience.required' => 'Experience is required',
            'name_experience.required' => 'Name Experience is required',
            'price_experience.required' => 'Price Experience is required',
            'unit_experience.required' => 'Unit Experience is required',
        ]);

        try {
            $validatedData = $validasi->validated();

            ExperiencePrice::create($validatedData);

            return redirect()->back()->with('success', 'Data Experience Price add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Experience Price failed to added');
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'id_experience' => 'required',
            'name_experience' => 'required',
            'price_experience' => 'required',
            'unit_experience' => 'required',
        ], [
            'id_experience.required' => 'Experience is required',
            'name_experience.required' => 'Name Experience is required',
            'price_experience.required' => 'Price Experience is required',
            'unit_experience.required' => 'Unit Experience is required',
        ]);

        try {
            $data = ExperiencePrice::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Experience Price updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Experience Price failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $experiencePrice = ExperiencePrice::findOrFail($id);
            $experiencePrice->delete();
            return redirect()->back()->with('success', 'Data Experience Price Question delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Experience Price Question failed to delete');
        }
    }
}
