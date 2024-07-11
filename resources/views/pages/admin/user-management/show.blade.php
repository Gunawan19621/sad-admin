@extends('layouts.master-dashboard')
@section('title', 'Edit User')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.user-management.index') }}">User</a>
    </li>
    <li class="breadcrumb-item active">Edit User</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit User</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4 text-center">
                    <div class=" mb-1 text-center">
                        <label class="form-label">Image</label>
                    </div>
                    <div class="mb-3">
                        @if ($userManagement->photo)
                            <img src="{{ asset('storage/' . $userManagement->photo) }}" alt="Image" class="img-fluid"
                                style="max-width: 100%; max-height: 250px">
                        @else
                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="name">Full Name</label>
                        <input class="form-control" id="name" value="{{ $userManagement->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" value="{{ $userManagement->email }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date">Date of Birth</label>
                        <input class="form-control" id="date" value="{{ $userManagement->date }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone">No. Telephone</label>
                        <input class="form-control" id="phone" value="{{ $userManagement->phone }}" readonly />
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Address</label>
                <textarea class="form-control" id="address" cols="30" rows="3" readonly>{{ $userManagement->address }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.user-management.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
