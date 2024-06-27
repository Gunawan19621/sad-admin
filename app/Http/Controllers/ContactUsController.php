<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactUs::all();
        $active = 'contact-us';

        foreach ($contacts as $contact) {
            // Convert JSON fields to associative arrays if they are not null
            $contact->social_media = json_decode($contact->social_media, true);
            $contact->google_maps = json_decode($contact->google_maps, true);
        }

        return view('pages.admin.layouts.contact-us.index', compact('contacts', 'active'));
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
    // public function store(Request $request)
    // {
    //     $validasi = Validator::make($request->all(), [
    //         'id_category_faq' => 'required',
    //         'question_faq' => 'required',
    //         'answer_faq' => 'required',
    //     ], [
    //         'id_category_faq.required' => 'Category FAQ is required',
    //         'question_faq.required' => 'Question FAQ is required',
    //         'answer_faq.required' => 'Answer FAQ is required',
    //     ]);

    //     try {
    //         $validatedData = $validasi->validated();

    //         FAQ::create($validatedData);

    //         return redirect()->back()->with('success', 'Data FAQ add successfully');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Data FAQ failed to added');
    //     }
    // }

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
    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'address' => 'required|string',
    //         'operating_hours' => 'required|string',
    //         'email' => 'required|string',
    //         'phone' => 'required|string',
    //         'fax' => 'required|string',
    //         'social_media.linkedin' => 'nullable|string',
    //         'social_media.instagram' => 'nullable|string',
    //         'social_media.facebook' => 'nullable|string',
    //         'social_media.youtube' => 'nullable|string',
    //         'latitude' => 'required|string',
    //         'longitude' => 'required|string',
    //     ]);

    //     try {
    //         $contact = ContactUs::findOrFail($id);
    //         $contact->address = $validatedData['address'];
    //         $contact->operating_hours = $validatedData['operating_hours'];
    //         $contact->email = $validatedData['email'];
    //         $contact->phone = $validatedData['phone'];
    //         $contact->fax = $validatedData['fax'];
    //         $contact->social_media = [
    //             'linkedin' => $validatedData['social_media']['linkedin'] ?? null,
    //             'instagram' => $validatedData['social_media']['instagram'] ?? null,
    //             'facebook' => $validatedData['social_media']['facebook'] ?? null,
    //             'youtube' => $validatedData['social_media']['youtube'] ?? null,
    //         ];
    //         $contact->google_maps = [
    //             'latitude' => $validatedData['latitude'],
    //             'longitude' => $validatedData['longitude'],
    //         ];
    //         $contact->save();

    //         return redirect()->back()->with('success', 'Contact updated successfully');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Failed to update contact: ' . $e->getMessage());
    //     }
    // }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'address' => 'required|string',
            'operating_hours' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'fax' => 'required|string',
            'social_media_linkedin' => 'nullable|string',
            'social_media_instagram' => 'nullable|string',
            'social_media_facebook' => 'nullable|string',
            'social_media_youtube' => 'nullable|string',
            'google_maps_latitude' => 'required|string',
            'google_maps_longitude' => 'required|string',
        ]);

        try {
            $contact = ContactUs::findOrFail($id);
            $contact->address = $validatedData['address'];
            $contact->operating_hours = $validatedData['operating_hours'];
            $contact->email = $validatedData['email'];
            $contact->phone = $validatedData['phone'];
            $contact->fax = $validatedData['fax'];
            $contact->social_media = [
                'linkedin' => $validatedData['social_media_linkedin'] ?? null,
                'instagram' => $validatedData['social_media_instagram'] ?? null,
                'facebook' => $validatedData['social_media_facebook'] ?? null,
                'youtube' => $validatedData['social_media_youtube'] ?? null,
            ];
            $contact->google_maps = [
                'latitude' => $validatedData['google_maps_latitude'],
                'longitude' => $validatedData['google_maps_longitude'],
            ];
            $contact->save();

            return redirect()->back()->with('success', 'Contact updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update contact: ' . $e->getMessage());
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
