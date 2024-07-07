<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryNewsEvent;
use Illuminate\Support\Facades\Validator;

class CategoryNewsEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'categoryNewsEvent' => CategoryNewsEvent::all(),
            'active' => 'categoryNewsEvent'
        ];
        return view('pages.admin.news-events.category-news-event.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name_category_news_event' => 'required',
        ], [
            'name_category_news_event.required' => 'Name Category News & Event is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $validatedData = $validasi->validated();

            CategoryNewsEvent::create($validatedData);

            return redirect()->back()->with('success', 'Data Category add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Category failed to added');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name_category_news_event' => 'required',
        ], [
            'name_category_news_event.required' => 'Name Category News & Event is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = CategoryNewsEvent::findOrFail($id);
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
            $categoryNewsEvent = CategoryNewsEvent::findOrFail($id);
            $categoryNewsEvent->delete();
            return redirect()->back()->with('success', 'Data Category News & Event delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Category News & Event failed to delete');
        }
    }
}
