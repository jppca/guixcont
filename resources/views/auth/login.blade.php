<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />
    <!-- Logo -->
    <div class="flex justify-center mb-6 m-0">

        <img
            src="{{ asset('images/guixcont_logo.svg') }}"
            alt="Logo"
            class="w-32 h-auto"
        >

    </div>
    <div class="text-center mb-10">
        <h1 class="h1" >GuixCont</h1>
    </div>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <!-- Email Address -->
        <div>

            <x-input-label
                for="email"
                :value="__('Email')"
            />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-input-label
                for="password"
                :value="__('Password')"
            />

            <div class="relative">

                <x-text-input
                    id="password"
                    class="block mt-1 w-full pr-10"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />

                <button
                    type="button"
                    id="togglePassword"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700"
                >

                    <!-- Eye Icon -->
                    <svg
                        id="eyeIcon"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12 18 19.5 12 19.5 2.25 12 2.25 12Z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 15.75A3.75 3.75 0 1 0 12 8.25a3.75 3.75 0 0 0 0 7.5Z"
                        />
                    </svg>

                </button>

            </div>

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>

        <!-- Remember Me -->
        <div class="block mt-4">

            <label
                for="remember_me"
                class="inline-flex items-center"
            >

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </span>

            </label>

        </div>

        <div class="flex items-center justify-end mt-4">

            @if (Route::has('password.request'))

                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}"
                >
                    {{ __('Forgot your password?') }}
                </a>

            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>

        </div>

    </form>

    <!-- Toggle Password Script -->
    <script>

        document
            .getElementById('togglePassword')
            .addEventListener('click', function () {

                const password =
                    document.getElementById('password');

                const eyeIcon =
                    document.getElementById('eyeIcon');

                if (password.type === 'password') {

                    password.type = 'text';

                    eyeIcon.innerHTML = `
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3l18 18"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.477 10.488A3 3 0 0 0 13.5 13.5"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.88 4.24A9.77 9.77 0 0 1 12 4c6 0 9.75 8 9.75 8a18.88 18.88 0 0 1-4.293 5.774"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.228 6.228A18.64 18.64 0 0 0 2.25 12s3.75 8 9.75 8a9.77 9.77 0 0 0 5.293-1.54"
                        />
                    `;

                } else {

                    password.type = 'password';

                    eyeIcon.innerHTML = `
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12 18 19.5 12 19.5 2.25 12 2.25 12Z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 15.75A3.75 3.75 0 1 0 12 8.25a3.75 3.75 0 0 0 0 7.5Z"
                        />
                    `;

                }

            });

    </script>

</x-guest-layout>
