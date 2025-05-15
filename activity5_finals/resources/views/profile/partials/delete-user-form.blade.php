<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold text-purple-800">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-purple-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 text-white px-4 py-2 rounded-md"
    >
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-purple-800">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-purple-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" :value="__('Password')" class="sr-only text-purple-700" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 rounded-md border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                    placeholder="{{ __('Password') }}"
                    required
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-purple-600" />
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <x-secondary-button
                    x-on:click="$dispatch('close')"
                    class="border border-purple-500 text-purple-700 hover:bg-purple-100 focus:ring-purple-500 px-4 py-2 rounded-md"
                >
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 text-white px-4 py-2 rounded-md">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
