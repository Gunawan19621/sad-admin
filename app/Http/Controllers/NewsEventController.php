<?php

namespace App\Http\Controllers;

use App\Models\CategoryNewsEvent;
use App\Models\NewsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsEvent = DB::table('tb_news_event')
            ->leftJoin('tb_category_news_event', 'tb_news_event.id_category_news_event', '=', 'tb_category_news_event.id')
            ->select('tb_news_event.*', 'tb_category_news_event.name_category_news_event')
            ->get();

        $data = [
            'newsEvent' => $newsEvent,
            'categoryNewsEvent' => CategoryNewsEvent::all(),
            'active' => 'newsEvent'
        ];
        return view('pages.admin.layouts.news-event.index', $data);
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
            'id_category_news_event' => 'required',
            'title_news_event' => 'required',
            'date_news_event' => 'required',
            'image_news_event' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_category_news_event.required' => 'Category News Event is required',
            'title_news_event.required' => 'Title News Event is required',
            'date_news_event.required' => 'Date News Event is required',
            'image_news_event.required' => 'Image News Event is required',
            'image_news_event.image' => 'Image News Event must be an image',
            'image_news_event.mimes' => 'Image News Event must be a file of type: jpeg, png, jpg, gif',
            'image_news_event.max' => 'Image News Event must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        try {
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_news_event')) {
                $imageName = time() . '.' . $request->image_news_event->extension();
                $request->image_news_event->move(public_path('images'), $imageName);
                $validatedData['image_news_event'] = $imageName;
            }

            NewsEvent::create($validatedData);

            return redirect()->back()->with('success', 'Data News & Event add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data News & Event failed to added');
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
            'id_category_news_event' => 'required',
            'title_news_event' => 'required',
            'date_news_event' => 'required',
            'image_news_event' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id_category_news_event.required' => 'Category News Event is required',
            'title_news_event.required' => 'Title News Event is required',
            'date_news_event.required' => 'Date News Event is required',
            'image_news_event.required' => 'Image News Event is required',
            'image_news_event.image' => 'Image News Event must be an image',
            'image_news_event.mimes' => 'Image News Event must be a file of type: jpeg, png, jpg, gif',
            'image_news_event.max' => 'Image News Event must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        try {
            $data = NewsEvent::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('image_news_event')) {
                if ($data->image_news_event && file_exists(public_path('images/' . $data->image_news_event))) {
                    unlink(public_path('images/' . $data->image_news_event));
                }

                $imageName = time() . '.' . $request->image_news_event->extension();
                $request->image_news_event->move(public_path('images'), $imageName);
                $validatedData['image_news_event'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data News & Event updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data News & Event failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $newsEvent = NewsEvent::findOrFail($id);
            $newsEvent->delete();
            return redirect()->back()->with('success', 'Data News & Event Question delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data News & Event Question failed to delete');
        }
    }
}
