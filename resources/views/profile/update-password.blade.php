@extends('layouts.master-dashboard')
@section('title', 'Update Password')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.profile.edit') }}">Edit Profile</a>
    </li>
    <li class="breadcrumb-item active">Update Password</li>
@endsection


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings / Account /</span> Update Password</h4>

    <!-- Alert -->
    @include('layouts.alert-component')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.profile.edit') }}">
                        <i class="bx bx-user me-1"></i>
                        Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="pages-account-settings-notifications.html">
                        <i class="bx bx-lock-alt me-1"></i>
                        Password
                    </a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="current_password">Current Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="current_password"
                                        id="current_password" autocomplete="current-password" />
                                    <span class="input-group-text password-toggle"><i
                                            class="menu-icon tf-icons bx bx-show"></i></span>
                                    @error('current_password')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="password">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="password" name="password"
                                        autocomplete="new-password" />
                                    <span class="input-group-text password-toggle"><i
                                            class="menu-icon tf-icons bx bx-show"></i></span>
                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="password_confirmation">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="password_confirmation"
                                        id="password_confirmation" autocomplete="new-password" />
                                    <span class="input-group-text password-toggle"><i
                                            class="menu-icon tf-icons bx bx-show"></i></span>
                                    @error('password_confirmation')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <p class="fw-medium mt-2">Password Requirements:</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="passwordLengthCheckbox" disabled>
                                    <label class="form-check-label" for="passwordLengthCheckbox">
                                        Minimum 8 characters - the more the better
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="passwordUpperLowerCheckbox"
                                        disabled>
                                    <label class="form-check-label" for="passwordUpperLowerCheckbox">
                                        Contains uppercase and lowercase letters
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="passwordNumberSymbolCheckbox"
                                        disabled>
                                    <label class="form-check-label" for="passwordNumberSymbolCheckbox">
                                        Contains numbers and symbols
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <button type="submit" class="btn btn-primary me-2">Save</button>
                                <button type="reset" onclick="window.location.reload();"
                                    class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script show/hide password and automatic checkbox check -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelectorAll('.password-toggle');
            const passwordInput = document.getElementById('password');
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
                const password = passwordInput.value;
                const isLengthValid = password.length >= passwordRequirements.minLength;
                const hasUpperCaseValid = passwordRequirements.hasUpperCase.test(password);
                const hasLowerCaseValid = passwordRequirements.hasLowerCase.test(password);
                const hasNumberValid = passwordRequirements.hasNumber.test(password);
                const hasSymbolValid = passwordRequirements.hasSymbol.test(password);

                passwordLengthCheckbox.checked = isLengthValid;
                passwordUpperLowerCheckbox.checked = hasUpperCaseValid && hasLowerCaseValid;
                passwordNumberSymbolCheckbox.checked = hasNumberValid && hasSymbolValid;
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

            passwordInput.addEventListener('input', validatePasswordRequirements);
            confirmPasswordInput.addEventListener('input', validatePasswordRequirements);
        });
    </script>
@endsection
