<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'enquiry' => Enquiry::all(),
            'active' => 'enquiry',
        ];

        return view('pages.admin.about.contact-us.enquiry.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'enquiring' => '',
                'message' => 'required',
                'our_newsletter' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'phone.required' => 'Phone is required',
                'email.required' => 'Email is required',
                'message.required' => 'Message is required',
                'our_newsletter.required' => 'Our newsletter is required',
            ]
        );

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = Enquiry::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);
            return redirect()->back()->with('success', 'Enquiry updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Enquiry: ' . $e->getMessage());
        }
    }
}
