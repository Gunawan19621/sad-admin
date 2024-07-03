<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\CategoryFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = DB::table('tb_faq')
            ->leftJoin('tb_category_faq', 'tb_faq.id_category_faq', '=', 'tb_category_faq.id')
            ->select('tb_faq.*', 'tb_category_faq.name_category_faq')
            ->get();

        $data = [
            'faq' => $faq,
            'categoryFaq' => CategoryFaq::all(),
            'active' => 'faq'
        ];
        return view('pages.admin.about.faq.index', $data);
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
            'id_category_faq' => 'required',
            'question_faq' => 'required',
            'answer_faq' => 'required',
        ], [
            'id_category_faq.required' => 'Category FAQ is required',
            'question_faq.required' => 'Question FAQ is required',
            'answer_faq.required' => 'Answer FAQ is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            FAQ::create($validatedData);

            return redirect()->back()->with('success', 'Data FAQ add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data FAQ failed to added');
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
            'id_category_faq' => 'required',
            'question_faq' => 'required',
            'answer_faq' => 'required',
        ], [
            'id_category_faq.required' => 'Category FAQ is required',
            'question_faq.required' => 'Question FAQ is required',
            'answer_faq.required' => 'Answer FAQ is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = FAQ::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data FAQ updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data FAQ failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $faq = FAQ::findOrFail($id);
            $faq->delete();
            return redirect()->back()->with('success', 'Data FAQ Question delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data FAQ Question failed to delete');
        }
    }
}
