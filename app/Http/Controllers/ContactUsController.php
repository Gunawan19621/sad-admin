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
            $contact->social_media = json_decode($contact->social_media, true);
            // $contact->google_maps = json_decode($contact->google_maps, true);
        }

        return view('pages.admin.about.contact-us.index', compact('contacts', 'active'));
    }

    /**
     * Update the specified resource in storage.
     */
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
            'google_maps' => 'required',
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
            $contact->google_maps = $validatedData['google_maps'];
            $contact->save();

            return redirect()->back()->with('success', 'Contact updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update contact: ' . $e->getMessage());
        }
    }
}
