@extends('layouts.master-dashboard')
@section('title', 'Edit Job Applicant')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.our-vision.index') }}">Work With Us</a>
    </li>
    <li class="breadcrumb-item active"> Edit Job Applicant</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Job Applicant</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.job-applicant.update', $jobApplicant->id) }}" method="POST"
                enctype="multipart/form-data" id="inputanForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class=" mb-1 text-center">
                            <label class="form-label">CV</label>
                        </div>
                        <div class="mb-3">
                            @if ($jobApplicant->cv_applicant)
                                <img src="{{ asset('images/' . $jobApplicant->cv_applicant) }}" alt="CV"
                                    class="img-fluid" style="max-width: 100%; max-height: 250px">
                            @else
                                <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="firstname">First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="firstname" name="firstname"
                                value="{{ $jobApplicant->firstname }}" placeholder="Enter Firstname" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="lastname">Last Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="lastname" name="lastname"
                                value="{{ $jobApplicant->lastname }}" placeholder="Enter Lastname" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email Address <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="email" id="email" name="email"
                                value="{{ $jobApplicant->email }}" placeholder="Enter Email" required />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="question1">Where are you interested in working?</label>
                    <select class="form-select" id="question1" name="question1" required>
                        <option disabled selected>Select one</option>
                        @foreach ($jobPosition as $data)
                            <option value="{{ $data->id }}"
                                {{ $jobApplicant->question1 == $data->id ? 'selected' : '' }}>
                                {{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="question2">What gets you excited about working at Sumber Air
                        Dewa?</label>
                    <input class="form-control" type="text" id="question2" name="question2"
                        value="{{ $jobApplicant->question2 }}" placeholder="Enter Question 2" />
                </div>
                <div class="mb-3">
                    <label for="cv_applicant" class="form-label">CV</label>
                    <input class="form-control" type="file" id="cv_applicant" name="cv_applicant" accept="image/*" />
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.job-applicant.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
