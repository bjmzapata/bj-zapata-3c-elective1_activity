<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-100 to-purple-200 px-4">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8 space-y-6">
            <h2 class="text-center text-2xl font-extrabold text-purple-700 mb-6">
                {{ __('Create your account') }}
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-purple-700 mb-1">Name</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        class="w-full px-4 py-2 border border-purple-300 rounded-lg shadow-sm
                               focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="Your full name"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-purple-700 mb-1">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        class="w-full px-4 py-2 border border-purple-300 rounded-lg shadow-sm
                               focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="you@example.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-purple-700 mb-1">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        class="w-full px-4 py-2 border border-purple-300 rounded-lg shadow-sm
                               focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-purple-700 mb-1">
                        Confirm Password
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        class="w-full px-4 py-2 border border-purple-300 rounded-lg shadow-sm
                               focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>

                <div class="flex items-center justify-between">
                    <a
                        href="{{ route('login') }}"
                        class="text-sm text-purple-600 hover:text-purple-800 font-semibold underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                    >
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg focus:ring-purple-500">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
