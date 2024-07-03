<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'jobApplicant' => JobApplicant::all(),
            'active' => 'jobApplicant',
        ];
        return view('pages.admin.work-with-us.index', $data);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $data = [
    //         'ourStory' => OurStory::all(),
    //         'active' => 'our-story',
    //     ];
    //     return view('pages.admin.layouts.our-story.create', $data);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'jobApplicant' => JobApplicant::findOrFail($id),
            'active' => 'jobApplicant',
        ];
        return view('pages.admin.work-with-us.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'jobApplicant' => JobApplicant::findOrFail($id),
            'active' => 'jobApplicant',
        ];
        return view('pages.admin.work-with-us.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'question1' => '',
            'question2' => '',
            'cv_applicant' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'firstname.required' => 'First Name is required',
            'lastname.required' => 'Last Name is required',
            'email.required' => 'Email is required',
            'cv_applicant.required' => 'CV Applicant is required',
            'cv_applicant.image' => 'CV Applicant must be an image',
            'cv_applicant.mimes' => 'CV Applicant must be a file of type: jpeg, png, jpg, gif',
            'cv_applicant.max' => 'CV Applicant must be a file of type: jpeg, png, jpg, gif and max 2048kb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = JobApplicant::findOrFail($id);
            $validatedData = $validasi->validated();

            if ($request->hasFile('cv_applicant')) {
                if ($data->cv_applicant && file_exists(public_path('images/' . $data->cv_applicant))) {
                    unlink(public_path('images/' . $data->cv_applicant));
                }

                $imageName = time() . '.' . $request->cv_applicant->extension();
                $request->cv_applicant->move(public_path('images'), $imageName);
                $validatedData['cv_applicant'] = $imageName;
            }

            $data->update($validatedData);

            return redirect()->route('dashboard.job-applicant.index')->with('success', 'Data Job Applicant updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Job Applicant failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $jobApplicant = JobApplicant::findOrFail($id);
            $jobApplicant->delete();
            return redirect()->back()->with('success', 'Data JobApplicant delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data JobApplicant failed to delete');
        }
    }
}
