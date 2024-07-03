<?php

namespace App\Http\Controllers;

use App\Models\CategoryFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'categoryFaq' => CategoryFaq::all(),
            'active' => 'category-faq'
        ];
        return view('pages.admin.about.faq.category-faq.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name_category_faq' => 'required',
        ], [
            'name_category_faq.required' => 'Name Category FAQ is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            CategoryFaq::create($validatedData);

            return redirect()->back()->with('success', 'Data Category add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Category failed to added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name_category_faq' => 'required',
        ], [
            'name_category_faq.required' => 'Name Category FAQ is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = CategoryFaq::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Category failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categoryFaq = CategoryFaq::findOrFail($id);
            $categoryFaq->delete();
            return redirect()->back()->with('success', 'Data Category FAQ delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Category FAQ failed to delete');
        }
    }
}
