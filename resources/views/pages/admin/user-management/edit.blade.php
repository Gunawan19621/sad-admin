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
            <form action="{{ route('dashboard.user-management.update', $userManagement->id) }}" method="POST"
                enctype="multipart/form-data" id="inputanForm">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name" name="name"
                                value="{{ $userManagement->name }}" placeholder="Enter user full name" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" id="email" name="email"
                                value="{{ $userManagement->email }}" placeholder="Enter user email" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="date">Date of Birth</label>
                            <input class="form-control" type="date" id="date" name="date"
                                value="{{ $userManagement->date }}" placeholder="Enter the date of birth" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="phone">No. Telephone</label>
                            <input class="form-control" type="text" id="phone" name="phone"
                                value="{{ $userManagement->phone }}" placeholder="Enter user phone number"
                                pattern="[0-9+\-\(\)\s]*"
                                oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '');" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="3"
                        placeholder="Enter the user address">{{ $userManagement->address }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="old_password">Old Password</label>
                    <div class="input-group">
                        <input class="form-control" type="password" id="old_password" name="old_password"
                            placeholder="Enter the old password">
                        <span class="input-group-text password-toggle"><i class="menu-icon tf-icons bx bx-show"></i></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="new_password">New Password</label>
                    <div class="input-group">
                        <input class="form-control" type="password" id="new_password" name="new_password"
                            placeholder="Enter the new password">
                        <span class="input-group-text password-toggle"><i class="menu-icon tf-icons bx bx-show"></i></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="confirm_password">Confirm New Password</label>
                    <div class="input-group">
                        <input class="form-control" type="password" id="confirm_password" name="new_password_confirmation"
                            placeholder="Enter the new password confirmation">
                        <span class="input-group-text password-toggle"><i class="menu-icon tf-icons bx bx-show"></i></span>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <p class="fw-medium mt-2">Password Requirements:</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="passwordLengthCheckbox" disabled>
                        <label class="form-check-label" for="passwordLengthCheckbox">
                            Minimum 8 characters - the more the better
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="passwordUpperLowerCheckbox" disabled>
                        <label class="form-check-label" for="passwordUpperLowerCheckbox">
                            Contains uppercase and lowercase letters
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="passwordNumberSymbolCheckbox" disabled>
                        <label class="form-check-label" for="passwordNumberSymbolCheckbox">
                            Contains numbers and symbols
                        </label>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('dashboard.user-management.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script show/hide password and automatic checkbox check -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelectorAll('.password-toggle');
            const newPasswordInput = document.getElementById('new_password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const passwordLengthCheckbox = document.getElementById('passwordLengthCheckbox');
            const passwordUpperLowerCheckbox = document.getElementById('passwordUpperLowerCheckbox');
            const passwordNumberSymbolCheckbox = document.getElementById('passwordNumberSymbolCheckbox');

            const passwordRequirements = {
                minLength: 8,
                hasUpperCase: /[A-Z]/,
                hasLowerCase: /[a-z]/,
                hasNumber: /[0-9]/,
                hasSymbol: /[!@#$%^&*()_+={}\[\]:;"'|<,>.?\/\\~-]/
            };

            function validatePasswordRequirements() {
                const password = newPasswordInput.value;
                const isLengthValid = password.length >= passwordRequirements.minLength;
                const hasUpperCaseValid = passwordRequirements.hasUpperCase.test(password);
                const hasLowerCaseValid = passwordRequirements.hasLowerCase.test(password);
                const hasNumberValid = passwordRequirements.hasNumber.test(password);
                const hasSymbolValid = passwordRequirements.hasSymbol.test(password);

                passwordLengthCheckbox.checked = isLengthValid;
                passwordUpperLowerCheckbox.checked = hasUpperCaseValid && hasLowerCaseValid;
                passwordNumberSymbolCheckbox.checked = hasSymbolValid && hasNumberValid;
            }

            // untuk hide and show password
            togglePassword.forEach(icon => {
                icon.addEventListener('click', function() {
                    const input = this.closest('.input-group').querySelector('input');
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.innerHTML = '<i class="menu-icon tf-icons bx bx-hide"></i>';
                    } else {
                        input.type = 'password';
                        this.innerHTML = '<i class="menu-icon tf-icons bx bx-show"></i>';
                    }
                });
            });

            newPasswordInput.addEventListener('input', validatePasswordRequirements);
            confirmPasswordInput.addEventListener('input', validatePasswordRequirements);
        });
    </script>
@endsection
