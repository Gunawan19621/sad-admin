@extends('layouts.master-dashboard')
@section('title', 'Show Enquiry')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.enquiry.index') }}">Enquiry</a>
    </li>
    <li class="breadcrumb-item active">Show Enquiry</li>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Enquiry</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" id="name" value="{{ $enquiry->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" value="{{ $enquiry->email }}" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone</label>
                        <input class="form-control" id="phone" value="{{ $enquiry->phone }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="enquiring">Enquiring</label>
                        <input class="form-control" id="enquiring" value="{{ $enquiry->enquiring }}" readonly />
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="our_newsletter">Our Newsletter</label>
                <select class="form-select" id="id_distributor" disabled>
                    <option>{{ $enquiry->our_newsletter }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="message">Message</label>
                <textarea id="message" class="form-control" rows="3" readonly>{{ $enquiry->message }}</textarea>
            </div>
            <div class="text-center">
                <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
