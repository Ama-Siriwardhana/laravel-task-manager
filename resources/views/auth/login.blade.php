<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<!-- Password -->
<div class="mt-4" x-data="{ show: false }">
    <x-input-label for="password" :value="__('Password')" />

    <div class="relative">
        <input
            :type="show ? 'text' : 'password'"
            id="password"
            name="password"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm pr-10"
            required
            autocomplete="current-password"
        />

        <!-- Eye Icon -->
        <button type="button"
            @click="show = !show"
            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700">

            <!-- Eye Open -->
            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5
                       c4.478 0 8.268 2.943 9.542 7
                       -1.274 4.057-5.064 7-9.542 7
                       -4.477 0-8.268-2.943-9.542-7z" />
            </svg>

            <!-- Eye Closed -->
            <svg x-show="show" xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19
                       c-4.478 0-8.268-2.943-9.542-7
                       a9.956 9.956 0 012.293-3.95M6.223 6.223
                       A9.956 9.956 0 0112 5
                       c4.478 0 8.268 2.943 9.542 7
                       a9.969 9.969 0 01-4.132 5.411M15 12
                       a3 3 0 00-4.243-4.243M3 3l18 18"/>
            </svg>

        </button>
    </div>

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        <x-primary-button class="bg-green-800 hover:bg-green-800 rounded-lg shadow transform hover:scale-110 transition duration-200 ml-6">
            {{ __('Log in') }}
        </x-primary-button>
    </form>
</x-guest-layout>
