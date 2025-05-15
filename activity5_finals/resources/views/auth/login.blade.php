<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-100 to-purple-200 px-4">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8 space-y-6">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <h2 class="text-center text-2xl font-extrabold text-purple-700 mb-6">
                {{ __('Welcome Back! Please Login') }}
            </h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-purple-700 mb-1">Your Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        required
                        autofocus
                        class="w-full px-4 py-2 border border-purple-300 rounded-lg shadow-sm
                               focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="you@example.com"
                    />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-purple-700 mb-1">Your Secure Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-2 border border-purple-300 rounded-lg shadow-sm
                               focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="••••••••"
                    />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="h-4 w-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                    />
                    <label for="remember_me" class="ml-2 block text-sm text-purple-700 font-medium">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-purple-600 hover:text-purple-800 font-semibold underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                        >
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg focus:ring-purple-500">
                        {{ __('Login') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
