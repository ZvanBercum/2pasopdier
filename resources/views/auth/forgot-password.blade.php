<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo/>
            </a>
        </x-slot>

        <div class="text">
            {{ __('Wachtwoord vergeten? Vul hier uw email in en dan mailen wij u de link naar het wachtwoord herstel formulier.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="session_status" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="validations_errors" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="forminput resetmail">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
            </div>
                <a class="login" href="{{ route('login') }}">
                    {{ __('Inloggen') }}
                </a>
            <x-button class="btn">
                {{ __('Stuur link') }}
            </x-button>

        </form>
    </x-auth-card>
</x-guest-layout>
