<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="validations_errors" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="forminput">
                <x-label for="name" :value="__('Naam')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div  class="forminput">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div  class="forminput">
                <x-label for="password" :value="__('Wachtwoord')" />

                <x-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div  class="forminput">
                <x-label for="password_confirmation" :value="__('Bevestig wachtwoord')" />

                <x-input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required />
            </div>


                <a class="login" href="{{ route('login') }}">
                    {{ __('Inloggen') }}
                </a>

                <x-button class="btn">
                    {{ __('Registreren') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
