@extends('layouts.master-dashboard')
@section('title', 'Show Job Applicant')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.our-vision.index') }}">Work With Us</a>
    </li>
    <li class="breadcrumb-item active">Show Job Applicant</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Job Applicant</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class=" mb-1 text-center">
                        <label class="form-label">CV</label>
                    </div>
                    <div class="mb-3">
                        @if ($jobApplicant->cv_applicant)
                            <img src="{{ asset('images/' . $jobApplicant->cv_applicant) }}" alt="CV" class="img-fluid"
                                style="max-width: 100%; max-height: 250px">
                        @else
                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="firstname">Firstname</label>
                        <input class="form-control" id="firstname" value="{{ $jobApplicant->firstname }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="lastname">Lastname</label>
                        <input class="form-control" id="lastname" value="{{ $jobApplicant->lastname }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" value="{{ $jobApplicant->email }}" readonly />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="question1">Where are you interested in working?</label>
                    <select class="form-select" id="question1" name="question1" disabled>
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
                    <input class="form-control" id="question2" value="{{ $jobApplicant->question2 }}" readonly />
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.job-applicant.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
