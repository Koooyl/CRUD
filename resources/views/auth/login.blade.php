<x-guest-layout>

            {{-- STATUS MESSAGE --}}
            <x-auth-session-status
                class="mb-6"
                :status="session('status')" />

            {{-- HEADER --}}
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-800">
                    Welcome Back
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Sign in to continue to your dashboard
                </p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                {{-- EMAIL --}}
                <div>
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full rounded-lg"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- PASSWORD --}}
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full rounded-lg"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- REMEMBER + FORGOT --}}
                <div class="flex items-center justify-between text-sm">
                    <label for="remember_me" class="inline-flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >
                        <span class="ms-2 text-gray-600">
                            {{ __('Remember me') }}
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-blue-600 hover:text-blue-700 font-medium">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                {{-- SUBMIT --}}
                <x-primary-button class="w-full justify-center py-3 text-base">
                    {{ __('Log in') }}
                </x-primary-button>

                {{-- REGISTER LINK --}}
                <p class="text-center text-sm text-gray-600 pt-4">
                    Don’t have an account?
                    <a href="{{ route('register') }}"
                       class="text-blue-600 hover:text-blue-700 font-medium">
                        Register
                    </a>
                </p>
            </form>

        </div>
    </div>
</x-guest-layout>
