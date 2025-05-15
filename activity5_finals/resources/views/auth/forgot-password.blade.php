<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-100 to-purple-200 px-4">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8 space-y-6">
            <h2 class="text-center text-2xl font-extrabold text-purple-700 mb-4">
                {{ __('Forgot your password?') }}
            </h2>

            <p class="text-sm text-gray-600 mb-6">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-purple-700 mb-1">
                        {{ __('Email') }}
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full px-4 py-2 border border-purple-300 rounded-lg shadow-sm
                               focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="you@example.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg focus:ring-purple-500">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
