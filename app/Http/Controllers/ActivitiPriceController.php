<?php

namespace App\Http\Controllers;

use App\Models\Activiti;
use App\Models\ActivitiPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ActivitiPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activitiPrice = DB::table('tb_activiti_price')
            ->leftJoin('tb_activiti', 'tb_activiti_price.id_activiti', '=', 'tb_activiti.id')
            ->select('tb_activiti_price.*', 'tb_activiti.title_activiti')
            ->get();

        $data = [
            'activitiPrice' => $activitiPrice,
            'activiti' => Activiti::all(),
            'active' => 'activitiPrice'
        ];
        return view('pages.admin.experience.activiti.activiti_price.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_activiti' => 'required',
            'price_activiti' => 'required',
            'name_price' => 'required',
        ], [
            'id_activiti.required' => 'Activiti is required',
            'price_activiti.required' => 'Price Activiti is required',
            'name_price.required' => 'Name Price is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            ActivitiPrice::create($validatedData);

            return redirect()->back()->with('success', 'Data Activiti Price add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Activiti Price failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'id_activiti' => 'required',
            'price_activiti' => 'required',
            'name_price' => 'required',
        ], [
            'id_activiti.required' => 'Activiti is required',
            'price_activiti.required' => 'Price Activiti is required',
            'name_price.required' => 'Name Price is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = ActivitiPrice::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Activiti Price updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Activiti Price failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $activitiPrice = ActivitiPrice::findOrFail($id);
            $activitiPrice->delete();
            return redirect()->back()->with('success', 'Data Activiti Price Question delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Activiti Price Question failed to delete');
        }
    }
}