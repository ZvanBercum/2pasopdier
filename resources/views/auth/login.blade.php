<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo/>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="session_status" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="validations_errors" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="forminput">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="forminput">
                <x-label for="password" :value="__('Wachtwoord')" />

                <x-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="remember">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="" name="remember">
                    <span class="">{{ __('Blijf ingelogd') }}</span>
                </label>
            </div>

                <a class="forgot" href="{{ route('password.request') }}">
                    {{ __('Wachtwoord vergeten?') }}
                </a>
                <a class="register" href="{{ route('register') }}">
                    {{ __('Nog geen account? Maak er 1 aan!') }}
                </a>

            <x-button class="btn">
                {{ __('Log in') }}
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>
