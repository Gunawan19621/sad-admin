{{-- <section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('dashboard.profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section> --}}
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button id="openModal" class="text-red-600 bg-red-100 hover:bg-red-200 px-4 py-2 rounded-md">
        Delete Account
    </button>

    <div id="confirmUserDeletionModal"
        class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden">
        <form method="post" action="{{ route('dashboard.profile.destroy') }}"
            class="bg-white p-6 rounded-md shadow-md w-full max-w-md">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter
                your password to confirm you would like to permanently delete your account.
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password"
                    class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Password">
                <!-- Assuming $errors->userDeletion->get('password') is converted to a variable called passwordErrors in your server-side rendering -->
                <div id="passwordError" class="text-red-600 mt-2">
                    <!-- Password error messages here -->
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" id="cancelModal"
                    class="text-gray-600 bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md">
                    Cancel
                </button>
                <button type="submit" class="ms-3 text-red-600 bg-red-100 hover:bg-red-200 px-4 py-2 rounded-md">
                    Delete Account
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('confirmUserDeletionModal').classList.remove('hidden');
        });

        document.getElementById('cancelModal').addEventListener('click', function() {
            document.getElementById('confirmUserDeletionModal').classList.add('hidden');
        });
    </script>
</section>
