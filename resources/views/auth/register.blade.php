<x-guest-layout>
    

            {{-- HEADER --}}
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-800">
                    Create an Account
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Register to access the Personal Data Sheet system
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- NAME --}}
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input
                        id="name"
                        class="block mt-1 w-full rounded-lg"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

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
                        autocomplete="new-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- CONFIRM PASSWORD --}}
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input
                        id="password_confirmation"
                        class="block mt-1 w-full rounded-lg"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                {{-- ACTIONS --}}
                <div class="flex flex-col gap-4 pt-4">
                    <x-primary-button class="w-full justify-center py-3 text-base">
                        {{ __('Register') }}
                    </x-primary-button>

                    <p class="text-center text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}"
                           class="text-blue-600 hover:text-blue-700 font-medium">
                            Sign in
                        </a>
                    </p>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
