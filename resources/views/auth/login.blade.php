<x-guest-layout>

    <!-- Theme Toggle -->
    <div class="d-flex justify-content-center m-3">

        <button
            id="themeToggle"
            class="btn btn-sm btn-outline-secondary rounded-pill d-flex align-items-center justify-content-center"
            style="width: 42px; height: 42px;"
        >

            <svg
                id="themeIcon"
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M21 12.79A9 9 0 1 1 11.21 3
                       7 7 0 0 0 21 12.79Z"
                />

            </svg>

        </button>

    </div>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

     <div class="d-flex justify-content-center mb-3">
    <!-- Login Card -->
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-5">

            <!-- Logo -->
            <div class="d-flex justify-content-center mb-4">

                <img
                    src="{{ asset('images/guixcont_logo.svg') }}"
                    alt="GuixCont"
                    class="img-fluid"
                    style="max-width: 120px;"
                >

            </div>

            <!-- Title -->
            <div class="text-center mb-4">

                <h1 class="h2 fw-bold mb-1">
                    GuixCont
                </h1>

            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">

                @csrf

                <!-- Email -->
                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Correo electrónico
                    </label>

                    <input
                        id="email"
                        type="email"
                        class="form-control form-control-lg"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2 text-danger small"
                    />

                </div>

                <!-- Password -->
                <div class="mb-3">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Contraseña
                    </label>

                    <div class="input-group">

                        <input
                            id="password"
                            type="password"
                            class="form-control form-control-lg"
                            name="password"
                            required
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            id="togglePassword"
                            class="btn btn-outline-secondary"
                        >

                            <svg
                                id="eyeIcon"
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12 18 19.5 12 19.5 2.25 12 2.25 12Z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M12 15.75A3.75 3.75 0 1 0 12 8.25a3.75 3.75 0 0 0 0 7.5Z"
                                />

                            </svg>

                        </button>

                    </div>

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2 text-danger small"
                    />

                </div>

                <!-- Remember -->
                <div class="form-check mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember_me"
                    >

                    <label
                        class="form-check-label"
                        for="remember_me"
                    >
                        Recordarme
                    </label>

                </div>

                <!-- Login Button -->
                <div class="d-grid mb-3">

                    <button
                        type="submit"
                        class="btn btn-primary btn-lg rounded-3"
                    >
                        Iniciar sesión
                    </button>

                </div>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))

                    <div class="text-center">

                        <a
                            href="{{ route('password.request') }}"
                            class="text-decoration-none"
                        >
                            ¿Olvidaste tu contraseña?
                        </a>

                    </div>

                @endif

            </form>

        </div>

    </div>
    </div>
</x-guest-layout>
