<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\TypeQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiry = DB::table('tb_enquiry')
            ->leftJoin('tb_type_question', 'tb_enquiry.enquiring', '=', 'tb_type_question.id')
            ->select(
                'tb_enquiry.*',
                'tb_type_question.name as type_question_name' // Menambahkan alias untuk nama kolom dari tb_type_question
            )
            ->get();

        $data = [
            'enquiry' => $enquiry,
            'typeQuestion' => TypeQuestion::all(),
            'active' => 'enquiry',
        ];

        return view('pages.admin.about.contact-us.enquiry.index', $data);
    }

    // public function index()
    // {
    //     $enquiry = DB::table('tb_enquiry')
    //         ->leftJoin('tb_type_question', 'tb_enquiry.enquiring', '=', 'tb_type_question.id')
    //         ->select('tb_enquiry.*', 'tb_type_question.name')
    //         ->get();

    //     $data = [
    //         'enquiry' => $enquiry,
    //         'typeQuestion' => TypeQuestion::all(),
    //         'active' => 'enquiry',
    //     ];

    //     return view('pages.admin.about.contact-us.enquiry.index', $data);
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'enquiry' => Enquiry::findOrFail($id),
            'typeQuestion' => TypeQuestion::all(),
            'active' => 'enquiry',
        ];
        return view('pages.admin.about.contact-us.enquiry.show', $data);
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
