<?php
$year = Date("Y") - 15;
?>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="validations_errors" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div class="forminput">
                <x-label for="name" :value="__('Naam')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus/>
            </div>

            <!-- Email Address -->
            <div class="forminput">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <div class="forminput">
                <x-label for="location" :value="_('Woonplaats')"/>
                <x-input id="location" type="text" name="location" :value="old('location')" required/>
            </div>

            <div class="forminput">
                <x-label for="role" :value="_('Ik ben een')"/>
                <select id="role" name="role" required>
                    <option value="2">Oppasser</option>
                    <option value="3">Eigenaar</option>
                    <option value="4">Oppasser en eigenaar</option>
                </select>
            </div>

            <div class="forminput">
                <x-label for="gender" :value="__('Geslacht')"/>
                <select id="gender" name="gender" required>
                    <option value="male">Mannelijk</option>
                    <option value="female">Vrouwelijk</option>
                    <option value="anders">Anders</option>
                </select>
            </div>

            <x-age-input/>


            <!-- Password -->
            <div class="forminput">
                <x-label for="password" :value="__('Wachtwoord')"/>

                <x-input id="password"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="forminput">
                <x-label for="password_confirmation" :value="__('Bevestig wachtwoord')"/>

                <x-input id="password_confirmation"
                         type="password"
                         name="password_confirmation" required/>
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
