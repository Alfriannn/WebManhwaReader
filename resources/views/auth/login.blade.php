<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-12 w-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">ManhwaReader</h2>
                <p class="text-gray-600">Masuk untuk mulai membaca</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700 mb-2" />
                        <x-text-input id="email" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username"
                            placeholder="Masukkan email Anda" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700 mb-2" />
                        <x-text-input id="password" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                            type="password"
                            name="password"
                            required 
                            autocomplete="current-password"
                            placeholder="Masukkan password Anda" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" 
                                type="checkbox" 
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" 
                                name="remember">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                {{ __('Ingat saya') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-purple-600 hover:text-purple-500" 
                               href="{{ route('password.request') }}">
                                {{ __('Lupa password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div>
                        <x-primary-button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            {{ __('Masuk') }}
                        </x-primary-button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center">
                        <span class="text-sm text-gray-600">Belum punya akun? </span>
                        <a href="{{ route('register') }}" 
                           class="text-sm font-medium text-purple-600 hover:text-purple-500">
                            {{ __('Daftar sekarang') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>