@extends('layouts.master-dashboard')
@section('title', 'Profile')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <!-- Alert -->
    @include('layouts.alert-component')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);">
                        <i class="bx bx-user me-1"></i>
                        Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.profile.updatePassword') }}">
                        <i class="bx bx-lock-alt me-1"></i>
                        Password
                    </a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>

                <!-- Photo Profile -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset($user->photo ? 'storage/' . $user->photo : 'assets/img/default-avatar.png') }}"
                            alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />

                        <div class="button-wrapper d-flex flex-column">
                            <div class="d-flex align-items-start gap-4">
                                <!-- Form untuk upload foto -->
                                <form id="formAccountSettings"
                                    action="{{ route('dashboard.profile.updateFoto', ['id' => $user->id]) }}" method="POST"
                                    enctype="multipart/form-data" class="d-flex align-items-start">
                                    @csrf
                                    @method('PATCH')
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" name="photo" class="account-file-input"
                                            accept="image/png, image/jpeg" hidden />
                                    </label>
                                </form>

                                <!-- Form untuk reset foto -->
                                <form id="formResetPhoto"
                                    action="{{ route('dashboard.profile.resetFoto', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" id="resetPhotoBtn"
                                        class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                </form>
                            </div>

                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>
                </div>

                <hr class="my-0" />

                <!-- Update Data Profile -->
                <div class="card-body">
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                    <form id="formAccountSettings" method="post" action="{{ route('dashboard.profile.update') }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" placeholder="Enter Your Full Name" required
                                    autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" id="email" name="email"
                                    value="{{ old('name', $user->email) }}" placeholder="Ente rYour Email" required />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="date" class="form-label">Date of Birth <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ old('name', $user->date) }}" required />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phone">Phone Number <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="{{ old('name', $user->phone) }}" placeholder="Enter Your Phone number"
                                    required />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control"cols="30" placeholder="Enter Your Address"
                                    rows="3">{{ old('name', $user->address) }}</textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <button type="reset" onclick="window.location.reload();"
                                class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Account -->
            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger deactivate-account" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Delete Account
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete your account?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('dashboard.profile.destroy') }}"
                    class="bg-white p-6 rounded-md shadow-md w-full max-w-md">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <p class="mt-1 text-sm text-gray-600">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Please
                            enter
                            your password to confirm you would like to permanently delete your account.
                        </p>
                        <div class="mt-6">
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('upload').addEventListener('change', function() {
            // Submit form when file is selected
            document.getElementById('formAccountSettings').submit();
        });

        document.getElementById('formResetPhoto').addEventListener('submit', function(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to reset your profile photo?')) {
                this.submit();
            }
        });
    </script>

@endsection
